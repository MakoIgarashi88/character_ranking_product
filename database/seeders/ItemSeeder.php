<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ranking;
use App\Models\Item;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max_ranking_id = Ranking::orderBy('id', 'desc')->first()->id;

        for ($i = 1; $i <= $max_ranking_id; $i++) {
            $model = new Item;
            $model->ranking_id = $i;
            $model->name = 'cute';
            $model->save();    
        }
        for ($i = 1; $i <= $max_ranking_id; $i++) {
            $model = new Item;
            $model->ranking_id = $i;
            $model->name = 'cool';
            $model->save();    
        }
        for ($i = 1; $i <= $max_ranking_id; $i++) {
            $model = new Item;
            $model->ranking_id = $i;
            $model->name = 'action';
            $model->save();    
        }
        for ($i = 1; $i <= $max_ranking_id; $i++) {
            $model = new Item;
            $model->ranking_id = $i;
            $model->name = 'forecast';
            $model->save();    
        }
        for ($i = 1; $i <= $max_ranking_id; $i++) {
            $model = new Item;
            $model->ranking_id = $i;
            $model->name = 'quiet';
            $model->save();    
        }
    }
}
