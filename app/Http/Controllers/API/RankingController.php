<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Ranking;
use App\Models\Item;
use App\Models\Character;
use App\Models\Parameter;
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::transaction(function () use ($request) {
            $ranking = new Ranking;
            $ranking->name = $request->ranking_name;
            $ranking->save();

            foreach ($request->check_parameters as $param) {
                $item = new Item;
                $item->ranking_id = $ranking->id;
                $item->name = $param;
                $item->save();
            };
        });
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        /**
         * select character_id, round(avg(cute)), ~~~~
         * from parameters
         * join characters
         * on character_id = characters.id
         * group by character_id
         * order by point asc;
         */
        $ranking = Ranking::find($id);
        $columns = Item::where('ranking_id', $id)->get()->pluck('name');
        $character_columns = ['characters.id', 'characters.name', 'characters.anime_title', 'characters.image_name'];

        // parameterテーブルとcharacterテーブルを結合
        $query = Parameter::join('characters', 'character_id', '=', 'characters.id')
            ->select($character_columns);

        // 各カラムごとに値を合計
        // ランキング要素となっているカラムを合計(pointを集計)
        $string = '';
        foreach ($columns as $index => $column) {
            $string .= $index ? "+ round(avg($column))" : "round(avg($column))";
        }
        $query->selectRaw("$string as point");

        // カラムごとの合計を、カラム名をキーとして配列に追加
        foreach ($columns as $column) {
            $query->selectRaw("round(avg($column)) as $column");
        }
        
        // キャラクターごとにまとめて、pointを昇順整列
        $characters = $query->groupBy($character_columns)->orderBy('point', 'desc')->get();

        $points = $characters->pluck('point');

        // ランキングキーを作成し、ランキングを付ける
        foreach($points as $index => $point) {
            $characters[$index]['rank'] = Ranking::getRank($index, $points);
        }

        return response()->json([
            'ranking' => new RankingResource($ranking),
            'characters' => $characters,
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
    public function list()
    {
        $rankings = Ranking::all();
        return $rankings;
    }
}
