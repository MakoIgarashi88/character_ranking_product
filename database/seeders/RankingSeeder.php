<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ranking;

class RankingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new Ranking;
        $model->name = 'かわいい';
        $model->save();

        $model = new Ranking;
        $model->name = 'かっこいい';
        $model->save();

        $model = new Ranking;
        $model->name = '最強';
        $model->save();

        $model = new Ranking;
        $model->name = '悪役';
        $model->save();

        $model = new Ranking;
        $model->name = 'ツンデレ';
        $model->save();

        $model = new Ranking;
        $model->name = 'ギャップ';
        $model->save();

        $model = new Ranking;
        $model->name = 'かしこい';
        $model->save();

        $model = new Ranking;
        $model->name = '友だちになりたい';
        $model->save();

    }
}
