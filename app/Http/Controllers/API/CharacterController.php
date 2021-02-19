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
    public function index(Request $request)
    {
        $countPerPage = 12;                // 1ページあたりの件数
        $page = $request->page;            // 現在のページ
        $offset = ($page-1)*$countPerPage; // 何件目から

        $query = Character::query();
        
        if ($request->search_word) {
            $string  = preg_replace("/( |　)/", " ", $request->search_word);
            $search_words = explode(" ", $string);

            foreach ($search_words as $word) {
                $query->orWhereRaw("name like ?", '%'.$word.'%');
                $query->orWhereRaw("anime_title like ?", '%'.$word.'%');
            }
        }

        // 絞り込まれたキャラクターの件数
        $characters_count = $query->count();
        $characters = $query->offset($offset)->limit($countPerPage)->get();
        $pageLength = ceil($characters_count / $countPerPage);

        return response()->json([
            'characters' => CharacterCardResource::collection($characters),
            'pageLength' => $pageLength,
        ]);
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
            $character = new Character;
            $character->name = $request->character['name'];
            $character->anime_title = $request->character['anime_title'];
            $character->image_name = Character::imageStore($request->upload_image);
            $character->character_voice = $request->character['character_voice'];
            $character->gender = $request->character['gender'];
            $character->birthday = $request->character['birthday'];
            $character->age = $request->character['age'];
            $character->blood_type = $request->character['blood_type'];
            $character->height = $request->character['height'];
            $character->weight = $request->character['weight'];
            $character->detail = $request->character['detail'];
            
            $character->save();

            return $character;
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
        DB::transaction(function () use ($request, $id) {
            $character = Character::find($id);
            $character->name = $request->character['name'];
            $character->anime_title = $request->character['anime_title'];
            $character->image_name = Character::imageStore($request->upload_image, $character->image_name);
            $character->character_voice = $request->character['character_voice'];
            $character->gender = $request->character['gender'];
            $character->birthday = $request->character['birthday'];
            $character->age = $request->character['age'];
            $character->blood_type = $request->character['blood_type'];
            $character->height = $request->character['height'];
            $character->weight = $request->character['weight'];
            $character->detail = $request->character['detail'];
            
            $character->save();
        });
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
