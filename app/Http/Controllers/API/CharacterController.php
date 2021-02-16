<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Character;
use App\Models\Ranking;
use App\Models\Item;
use App\Models\Parameter;
use App\Http\Resources\Character as CharacterResource;
use App\Http\Resources\CharacterCard as CharacterCardResource;

class CharacterController extends Controller
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
            $columns = Item::where('ranking_id', $ranking->id)->get()->pluck('name');
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

            // カラムごとの平均を、カラム名をキーとして配列に追加
            foreach ($columns as $column) {
                $query->selectRaw("round(avg($column)) as $column");
            }
            
            // キャラクターごとにまとめて、pointを昇順整列
            $characters = $query->groupBy($character_columns)->orderBy('point', 'desc')->take(4)->get();

            $points = $characters->pluck('point');

            // ランキングキーを作成し、ランキングを付ける
            foreach($points as $index => $point) {
                $characters[$index]['rank'] = Ranking::getRank($index, $points);
            }

            $ranking['characters'] = $characters;
        }

        return $rankings;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function searchList()
    {
        $characters = Character::all();
        return CharacterCardResource::collection($characters);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function search(Request $request)
    {
        $characters = Character::where('name', $request->word)->get();
        return ($characters);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $character = DB::transaction(function () use ($request) {
            $character = new Character;
            $character->name = $request->character['name'];
            $character->anime_title = $request->character['anime_title'];
            $character->character_voice = $request->character['character_voice'];
            $character->gender = $request->character['gender'];
            $character->birthday = $request->character['birthday'];
            $character->age = $request->character['age'];
            $character->blood_type = $request->character['blood_type'];
            $character->height = $request->character['height'];
            $character->weight = $request->character['weight'];
            $character->detail = $request->character['detail'];
            if ($request->upload_image) {
                $character->image_name = $request->upload_image;
            }
            
            $character->save();

            return $character;
        });

        return $character;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return new CharacterResource(Character::find($id));
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
}
