<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Character;

class CharacterSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $model = new Character;
        $model->name = '爆豪勝己';
        $model->anime_title = '僕のヒーローアカデミア';
        $model->image_name = '/storage/images/02.jpeg';
        $model->character_voice = '岡本信彦';
        $model->gender = '男性';
        $model->birthday = '04/20';
        $model->age = '16';
        $model->blood_type = '不明';
        $model->height = '172';
        $model->weight = '不明';
        $model->detail = '雄英高校ヒーロー科。薄い金髪に赤目の三白眼が特徴的な少年。主人公である緑谷出久とは幼馴染みで彼からの呼称は「かっちゃん」。将来の夢は本人曰く、「オールマイトをも超えるトップヒーローとなり、高額納税者ランキングに名を刻むこと」完璧主義者。';
        $model->save();
        
        $model = new Character;
        $model->name = '胡蝶しのぶ';
        $model->anime_title = '鬼滅の刃';
        $model->image_name = '/storage/images/03.jpg';
        $model->character_voice = '早見沙織';
        $model->gender = '女性';
        $model->birthday = '02/24';
        $model->age = '18';
        $model->blood_type = '不明';
        $model->height = '151';
        $model->weight = '37';
        $model->detail = '鬼殺隊の隊士の中でも、柱と呼ばれる最上級剣士の一人。「蟲柱」の称号を持つ。不死に近い人喰い鬼の数少ない弱点である、藤の花から精製した特殊な毒によって鬼を滅殺する。';
        $model->save();
        
        $model = new Character;
        $model->name = '釘崎野薔薇';
        $model->anime_title = '呪術廻戦';
        $model->image_name = '/storage/images/04.jpg';
        $model->character_voice = '瀬戸麻沙美';
        $model->gender = '女性';
        $model->birthday = '08/07';
        $model->age = '16';
        $model->blood_type = '不明';
        $model->height = '160未満';
        $model->weight = '不明';
        $model->detail = 'かなりサバサバしており感情が表情に出やすいタイプでよく言えば素直、悪く言えば図々しい少女であり、気が非常に強く怒りに駆られると不良のようなガラの悪い言葉遣いになることもしばしばある。';
        $model->save();
        
        $model = new Character;
        $model->name = '黒崎一護';
        $model->anime_title = 'BLEACH';
        $model->image_name = '/storage/images/05.jpeg';
        $model->character_voice = '森田成一';
        $model->gender = '男性';
        $model->birthday = '7/15';
        $model->age = '17';
        $model->blood_type = 'AO';
        $model->height = '181';
        $model->weight = '66';
        $model->detail = '外見はオレンジ髪に茶色の瞳を持つ青年。『一護』という名前は、何か一つのものを護り通せるように、の意味に由来している。一見すると、どこにでもいそうなごく普通の高校生だが、異常なまでに優れた霊感を持つ。正義感が強く心優しい好青年で義理堅く見返りを求めたり、卑怯な事も殆どしないタイプである。';
        $model->save();
        
        $model = new Character;
        $model->name = 'ナミ';
        $model->anime_title = 'ONE PIECE';
        $model->image_name = '/storage/images/06.jpg';
        $model->character_voice = '岡村朋美/山崎和佳奈（代役70~78話）';
        $model->gender = '女性';
        $model->birthday = '7/3';
        $model->age = '20';
        $model->blood_type = 'X';
        $model->height = '170';
        $model->weight = '不明';
        $model->detail = '海賊「麦わらの一味」の航海士で、主人公モンキー・D・ルフィの2人目の仲間（ただし正式加入したのはサンジの後）。体で気候の流れを知ることが出来るという天性の才能を持つと共に、幼少期より培ってきた精巧な海図の作成技術と航海術、その他様々な知識を有する才色兼備の女性であり、奇天烈な天候や現象が各所で発生する「偉大なる航路（グランドライン）」の航海には欠かせない存在。';
        $model->save();
        
        $model = new Character;
        $model->name = '毛利蘭';
        $model->anime_title = '名探偵コナン';
        $model->image_name = '/storage/images/07.jpg';
        $model->character_voice = '山崎和佳奈';
        $model->gender = '女性';
        $model->birthday = '不明';
        $model->age = '17';
        $model->blood_type = '不明';
        $model->height = '160';
        $model->weight = '不明';
        $model->detail = '主人公･江戸川コナンの正体である工藤新一とは幼馴染。新一の帰りをひたすら待つ一方で、居候であるコナンの姉的な役割を果たしている。';
        $model->save();
        
        $model = new Character;
        $model->name = '越前リョーマ';
        $model->anime_title = 'テニスの王子様';
        $model->image_name = '/storage/images/08.png';
        $model->character_voice = '皆川純子';
        $model->gender = '男性';
        $model->birthday = '12/24';
        $model->age = '12';
        $model->blood_type = 'O';
        $model->height = '152';
        $model->weight = '47';
        $model->detail = 'テニスの王子様及び新テニスの王子様の主人公。青春学園１年生で青学のスーパールーキーとして一躍注目される。名テニスプレーヤーの父・越前南次郎から受け継いだテニスセンスとテニスの英才教育を受けて育った。プレイスタイルはオールラウンダー。得意技はツイストサーブやドライブA～D、COOLドライブ、サムライドライブなど。ダブルスは性格上の問題で向いておらず、根っからのシングルス選手である。';
        $model->save();
    }
}
