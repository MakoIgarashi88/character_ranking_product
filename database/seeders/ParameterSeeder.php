<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Character;
use App\Models\Parameter;

class ParameterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max_character_id = Character::orderBy('id', 'desc')->first()->id;

        for ($i = 1; $i <= $max_character_id; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                $model = new Parameter;
                $model->character_id = $i;
                $model->cute = $j;
                $model->cool = $j;
                $model->wild = $j;
                $model->beautiful = $j;
                $model->fresh = $j;
        
                $model->kind = $j;
                $model->gentle = $j;
                $model->quiet = $j;
                $model->active = $j;
                $model->scare = $j;
        
                $model->action = $j;
                $model->power = $j;
                $model->speed = $j;
                $model->strategy = $j;
                $model->endurance = $j;
        
                $model->logic = $j;
                $model->knowledge = $j;
                $model->vocabulary = $j;
                $model->forecast = $j;
                $model->memory = $j;
        
                $model->save();    
            }
        }
    }
}
