<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ranking;
use App\Models\Item;
use App\Models\Character;
use App\Models\Parameter;
use App\Models\ParameterLabel;
use App\Http\Resources\Ranking as RankingResource;
use App\Http\Resources\CharacterCard as CharacterCardResource;

class RankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rankings = Ranking::orderBy('id', 'desc')->take(5)->get(['id', 'name']);
        foreach ($rankings as $ranking) {
            // ランキングを構成しているパラメーター（かわいいなど）を取得
            $items = Item::join('parameter_labels', 'items.name', '=', 'parameter_labels.key_name')
                ->where('items.ranking_id', $ranking->id)
                ->get(['parameter_labels.label', 'parameter_labels.color', 'items.name']);

            $columns = $items->pluck('name');

            $character_columns = ['characters.id', 'characters.name', 'characters.anime_title', 'characters.image_name'];
    
            // parameterテーブルとcharacterテーブルを結合
            $query = Parameter::join('characters', 'character_id', '=', 'characters.id')
                ->select($character_columns);

            // 各カラムごとに値を合計
            // ランキング要素となっているカラムを合計(pointを集計)
            $query->selectRaw(Ranking::getColumnAvgSumQuery($columns) . "as point");

            // カラムごとの平均を、カラム名をキーとして配列に追加
            foreach ($columns as $column) {
                $query->selectRaw("round(avg($column),1) as $column");
            }
            
            // キャラクターごとにまとめて、pointを昇順整列
            $characters = $query->groupBy($character_columns)->orderBy('point', 'desc')->take(4)->get();

            $points = $characters->pluck('point');

            // ランキングキーを作成し、ランキングを付ける
            foreach($points as $index => $point) {
                $characters[$index]['rank'] = Ranking::getRank($index, $points);
            }

            $ranking['characters'] = $characters;
            $ranking['items'] = $items;
        }

        return $rankings;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return DB::transaction(function () use ($request) {
            $ranking = new Ranking;
            $ranking->name = $request->ranking_name;
            $ranking->save();

            foreach ($request->check_parameters as $param) {
                $item = new Item;
                $item->ranking_id = $ranking->id;
                $item->name = $param;
                $item->save();
            };
            return $ranking;
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $ranking = Ranking::find($id);
        $columns = Item::where('ranking_id', $id)->get()->pluck('name');
        $character_columns = ['characters.id', 'characters.name', 'characters.anime_title', 'characters.image_name'];

        // parameterテーブルとcharacterテーブルを結合
        $query = Parameter::join('characters', 'character_id', '=', 'characters.id')
            ->select($character_columns);

        // 各カラムごとに値を合計
        // ランキング要素となっているカラムを合計(pointを集計)
        $query->selectRaw(Ranking::getColumnAvgSumQuery($columns) . "as point");

        // カラムごとの合計を、カラム名をキーとして配列に追加
        foreach ($columns as $column) {
            $query->selectRaw("round(avg($column),1) as $column");
        }
        
        // キャラクターごとにまとめて、pointを昇順整列
        $characters = $query->groupBy($character_columns)->orderBy('point', 'desc')->get();
        $points = $characters->pluck('point');

        // ページネーション
        $characters_count = count($characters);     // ヒットしたキャラクターの件数
        $countPerPage = 12;                         // 1ページあたりの件数
        $page = $request->page;                     // 現在のページ

        // 絞り込まれたキャラクターの件数
        $characters = $characters->forPage($page, $countPerPage)->all();
        $pageLength = ceil($characters_count / $countPerPage);

        // ランキングキーを作成し、ランキングを付ける
        foreach ($characters as $index => $character) {
            $character['rank'] = Ranking::getRank($index, $points);
        }

        // ランキングを構成しているパラメーター（かわいいなど）を取得
        $items = Item::join('parameter_labels', 'items.name', '=', 'parameter_labels.key_name')
            ->where('items.ranking_id', $id)
            ->get(['parameter_labels.label', 'parameter_labels.color', 'items.name']);

        return response()->json([
            'ranking' => new RankingResource($ranking),
            'characters' => $characters,
            'items' => $items,
            'pageLength' => $pageLength,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * ランキングのidとランキング名を取得,ランキング一覧ページ
     */
    public function list(Request $request)
    {
        $search_word  = $request->search_word;    // 検索ワード
        $page         = $request->page;           // 現在のページ
        $countPerPage = 10;                       // 1ページあたりの件数
        $offset       = ($page-1)*$countPerPage;  // 何件目から
        
        $query = Ranking::select('id', 'name');

        if ($search_word) {
            $string  = preg_replace("/( |　)/", " ", $search_word);
            $search_words = explode(" ", $string);

            foreach ($search_words as $word) {
                $query->orWhereRaw("name like ?", '%'.$word.'%');
            }
        }

        $ranking_count = $query->count();
        $pageLength    = ceil($ranking_count / $countPerPage);
        $rankings      = $query->offset($offset)->limit($countPerPage)->get();

        foreach ($rankings as $ranking) {
            $ranking["params"] = Item::select('parameter_labels.label', 'parameter_labels.color')
                ->join('parameter_labels', 'items.name', '=', 'parameter_labels.key_name')
                ->where('items.ranking_id', $ranking->id)
                ->get();
        }

        return response()->json([
            'rankings' => $rankings,
            'pageLength' => $pageLength,
        ]);
    }

    /**
     * 検索ワードと一致するランキングのidとランキング名を取得,ランキング一覧ページ
     */
    public function search(Request $request)
    {
        $rankings = Ranking::where('name', $request->word)->get();
        return $rankings;
    }
}
