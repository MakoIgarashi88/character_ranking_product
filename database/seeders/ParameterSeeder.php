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
        $start = 1;
        $end = 5;

        for ($i = 1; $i <= $max_character_id; $i++) {
            for ($j = 1; $j <= 5; $j++) {
                $model = new Parameter;
                $model->character_id = $i;
                $model->cute = rand($start, $end);
                $model->cool = rand($start, $end);
                $model->wild = rand($start, $end);
                $model->beautiful = rand($start, $end);
                $model->fresh = rand($start, $end);
        
                $model->kind = rand($start, $end);
                $model->gentle = rand($start, $end);
                $model->quiet = rand($start, $end);
                $model->active = rand($start, $end);
                $model->scare = rand($start, $end);
        
                $model->action = rand($start, $end);
                $model->power = rand($start, $end);
                $model->speed = rand($start, $end);
                $model->strategy = rand($start, $end);
                $model->endurance = rand($start, $end);
        
                $model->logic = rand($start, $end);
                $model->knowledge = rand($start, $end);
                $model->vocabulary = rand($start, $end);
                $model->forecast = rand($start, $end);
                $model->memory = rand($start, $end);
        
                $model->save();    
            }
        }
    }
}
