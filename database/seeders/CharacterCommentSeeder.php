<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Character;
use App\Models\CharacterComment;

class CharacterCommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max_character_id = Character::orderBy('id', 'desc')->first()->id;

        for ($i=1; $i <= $max_character_id; $i++ ) {
            $model = new CharacterComment;
            $model->character_id = $i;
            $model->body = '大好き';
            $model->save();
        }
        for ($i=1; $i <= $max_character_id; $i++ ) {
            $model = new CharacterComment;
            $model->character_id = $i;
            $model->body = 'かわいい';
            $model->save();
        }
        for ($i=1; $i <= $max_character_id; $i++ ) {
            $model = new CharacterComment;
            $model->character_id = $i;
            $model->body = 'かっこいい';
            $model->save();
        }
    }
}
