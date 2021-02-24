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
        $model = new Item;
        $model->ranking_id = 1;
        $model->name = 'cute';
        $model->save();

        $model = new Item;
        $model->ranking_id = 2;
        $model->name = 'cool';
        $model->save();

        $model = new Item;
        $model->ranking_id = 3;
        $model->name = 'power';
        $model->save();

        $model = new Item;
        $model->ranking_id = 3;
        $model->name = 'forecast';
        $model->save();

        $model = new Item;
        $model->ranking_id = 3;
        $model->name = 'speed';
        $model->save();

        $model = new Item;
        $model->ranking_id = 3;
        $model->name = 'strategy';
        $model->save();

        $model = new Item;
        $model->ranking_id = 4;
        $model->name = 'strategy';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 4;
        $model->name = 'scare';
        $model->save();

        $model = new Item;
        $model->ranking_id = 5;
        $model->name = 'logic';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 5;
        $model->name = 'knowledge';
        $model->save();

        $model = new Item;
        $model->ranking_id = 5;
        $model->name = 'vocabulary';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 5;
        $model->name = 'forecast';
        $model->save();

        $model = new Item;
        $model->ranking_id = 5;
        $model->name = 'memory';
        $model->save();

        $model = new Item;
        $model->ranking_id = 6;
        $model->name = 'cute';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 6;
        $model->name = 'scare';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 7;
        $model->name = 'action';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 7;
        $model->name = 'power';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 7;
        $model->name = 'speed';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 7;
        $model->name = 'strategy';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 7;
        $model->name = 'endurance';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 7;
        $model->name = 'logic';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 7;
        $model->name = 'knowledge';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 7;
        $model->name = 'vocabulary';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 7;
        $model->name = 'forecast';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 7;
        $model->name = 'memory';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 8;
        $model->name = 'cool';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 8;
        $model->name = 'wild';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 8;
        $model->name = 'action';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 8;
        $model->name = 'strategy';
        $model->save();
        
        $model = new Item;
        $model->ranking_id = 8;
        $model->name = 'speed';
        $model->save();

        $model = new Item;
        $model->ranking_id = 8;
        $model->name = 'forecast';
        $model->save();

        $model = new Item;
        $model->ranking_id = 9;
        $model->name = 'beautiful';
        $model->save();

        $model = new Item;
        $model->ranking_id = 9;
        $model->name = 'kind';
        $model->save();

        $model = new Item;
        $model->ranking_id = 9;
        $model->name = 'gentle';
        $model->save();

        $model = new Item;
        $model->ranking_id = 10;
        $model->name = 'fresh';
        $model->save();

        $model = new Item;
        $model->ranking_id = 10;
        $model->name = 'kind';
        $model->save();

        $model = new Item;
        $model->ranking_id = 10;
        $model->name = 'gentle';
        $model->save();

        $model = new Item;
        $model->ranking_id = 10;
        $model->name = 'quiet';
        $model->save();

        $model = new Item;
        $model->ranking_id = 11;
        $model->name = 'scare';
        $model->save();

        $model = new Item;
        $model->ranking_id = 12;
        $model->name = 'power';
        $model->save();

        $model = new Item;
        $model->ranking_id = 12;
        $model->name = 'endurance';
        $model->save();

        $model = new Item;
        $model->ranking_id = 13;
        $model->name = 'cool';
        $model->save();

        $model = new Item;
        $model->ranking_id = 13;
        $model->name = 'fresh';
        $model->save();

        $model = new Item;
        $model->ranking_id = 13;
        $model->name = 'kind';
        $model->save();

        $model = new Item;
        $model->ranking_id = 13;
        $model->name = 'active';
        $model->save();

        $model = new Item;
        $model->ranking_id = 13;
        $model->name = 'action';
        $model->save();

        $model = new Item;
        $model->ranking_id = 13;
        $model->name = 'endurance';
        $model->save();





        // $max_ranking_id = Ranking::orderBy('id', 'desc')->first()->id;
        // $columns = [
        //     'cute', 'cool', 'wild', 'beautiful', 'fresh',
        //     'kind', 'gentle', 'quiet', 'active', 'scare',
        //     'action', 'power', 'speed', 'strategy', 'endurance',
        //     'logic', 'knowledge', 'vocabulary', 'forecast', 'memory',
        // ];

        // for ($i = 1; $i <= $max_ranking_id; $i++) {
        //     foreach ($columns as $column) {
        //         if (rand(0, 1)) {
        //             $model = new Item;
        //             $model->ranking_id = $i;
        //             $model->name = $column;
        //             $model->save();  
        //         }
        //     }
        // }

    }
}
