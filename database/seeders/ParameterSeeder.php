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
        for ($i = 1; $i <= 3; $i++) {
            $model = new Parameter;
            $model->character_id = 1;
            $model->cute = 5;
            $model->cool = 5;
            $model->wild = 5;
            $model->beautiful = 5;
            $model->fresh = 5;
    
            $model->kind = 5;
            $model->gentle = 5;
            $model->quiet = 5;
            $model->active = 5;
            $model->scare = 5;
    
            $model->action = 5;
            $model->power = 5;
            $model->speed = 5;
            $model->strategy = 5;
            $model->endurance = 5;
    
            $model->logic = 5;
            $model->knowledge = 5;
            $model->vocabulary = 5;
            $model->forecast = 5;
            $model->memory = 5;

            $model->save();
        }

        for ($i = 1; $i <= 3; $i++) {
            $model = new Parameter;
            $model->character_id = 2;
            $model->cute = 1;
            $model->cool = 1;
            $model->wild = 1;
            $model->beautiful = 1;
            $model->fresh = 1;
    
            $model->kind = 1;
            $model->gentle = 1;
            $model->quiet = 1;
            $model->active = 1;
            $model->scare = 1;
    
            $model->action = 1;
            $model->power = 1;
            $model->speed = 1;
            $model->strategy = 1;
            $model->endurance = 1;
    
            $model->logic = 1;
            $model->knowledge = 1;
            $model->vocabulary = 1;
            $model->forecast = 1;
            $model->memory = 1;

            $model->save();
        }
        for ($i = 1; $i <= 5; $i++) {
            $model = new Parameter;
            $model->character_id = 3;
            $model->cute = 1;
            $model->cool = 1;
            $model->wild = 1;
            $model->beautiful = 1;
            $model->fresh = 1;
    
            $model->kind = 1;
            $model->gentle = 1;
            $model->quiet = 1;
            $model->active = 1;
            $model->scare = 1;
    
            $model->action = 1;
            $model->power = 1;
            $model->speed = 1;
            $model->strategy = 1;
            $model->endurance = 1;
    
            $model->logic = 1;
            $model->knowledge = 1;
            $model->vocabulary = 1;
            $model->forecast = 1;
            $model->memory = 1;

            $model->save();
        }
        for ($i = 1; $i <= 3; $i++) {
            $model = new Parameter;
            $model->character_id = 7;
            $model->cute = 4;
            $model->cool = 4;
            $model->wild = 4;
            $model->beautiful = 4;
            $model->fresh = 4;
    
            $model->kind = 4;
            $model->gentle = 4;
            $model->quiet = 4;
            $model->active = 4;
            $model->scare = 4;
    
            $model->action = 4;
            $model->power = 4;
            $model->speed = 4;
            $model->strategy = 4;
            $model->endurance = 4;
    
            $model->logic = 4;
            $model->knowledge = 4;
            $model->vocabulary = 4;
            $model->forecast = 4;
            $model->memory = 4;

            $model->save();
        }
    }
}
