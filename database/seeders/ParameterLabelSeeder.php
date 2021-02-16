<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ParameterLabel;

class ParameterLabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new ParameterLabel;
        $model->label = 'かわいい';
        $model->key_name = 'cute';
        $model->color = 'pink';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = 'かっこいい';
        $model->key_name = 'cool';
        $model->color = 'blue';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = 'ワイルド';
        $model->key_name = 'wild';
        $model->color = 'blue-grey';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '美しい';
        $model->key_name = 'beautiful';
        $model->color = 'purple';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = 'さわやか';
        $model->key_name = 'fresh';
        $model->color = 'light-green';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '優しい';
        $model->key_name = 'kind';
        $model->color = 'lime';
        $model->save();

        $model = new ParameterLabel;
        $model->label = '穏やか';
        $model->key_name = 'gentle';
        $model->color = 'lime';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = 'おとなしい';
        $model->key_name = 'quiet';
        $model->color = 'teal';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '活発';
        $model->key_name = 'active';
        $model->color = 'deep-orange';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '怖い';
        $model->key_name = 'scare';
        $model->color = 'indigo';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '行動力';
        $model->key_name = 'action';
        $model->color = 'orange';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '筋力';
        $model->key_name = 'power';
        $model->color = 'amber';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = 'すばやい';
        $model->key_name = 'speed';
        $model->color = 'light-blue';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '戦略';
        $model->key_name = 'strategy';
        $model->color = 'green';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '忍耐';
        $model->key_name = 'endurance';
        $model->color = 'yellow';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '論理的';
        $model->key_name = 'logic';
        $model->color = 'cyan';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '博識';
        $model->key_name = 'knowledge';
        $model->color = 'lime';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '語彙力';
        $model->key_name = 'vocabulary';
        $model->color = 'red';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '予測';
        $model->key_name = 'forecast';
        $model->color = 'pink';
        $model->save();
        
        $model = new ParameterLabel;
        $model->label = '記憶力';
        $model->key_name = 'memory';
        $model->color = 'amber';
        $model->save();
    }
}
