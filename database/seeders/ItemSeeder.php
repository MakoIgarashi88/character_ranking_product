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

        $columns = [
            'cute', 'cool', 'wild', 'beautiful', 'fresh',
            'kind', 'gentle', 'quiet', 'active', 'scare',
            'action', 'power', 'speed', 'strategy', 'endurance',
            'logic', 'knowledge', 'vocabulary', 'forecast', 'memory',
        ];

        for ($i = 1; $i <= $max_ranking_id; $i++) {
            foreach ($columns as $column) {
                if (rand(0, 1)) {
                    $model = new Item;
                    $model->ranking_id = $i;
                    $model->name = $column;
                    $model->save();  
                }
            }
        }

    }
}
