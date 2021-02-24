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
        $model->name = 'かしこい';
        $model->save();

        $model = new Ranking;
        $model->name = 'ギャップ';
        $model->save();

        $model = new Ranking;
        $model->name = '頼れる';
        $model->save();

        $model = new Ranking;
        $model->name = 'イケメン';
        $model->save();

        $model = new Ranking;
        $model->name = '華やか';
        $model->save();

        $model = new Ranking;
        $model->name = '清楚';
        $model->save();

        $model = new Ranking;
        $model->name = '怖い';
        $model->save();

        $model = new Ranking;
        $model->name = 'バキ';
        $model->save();

        $model = new Ranking;
        $model->name = 'ジャンプの主人公';
        $model->save();

    }
}
