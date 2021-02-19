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
        $model->birthday = '4/20';
        $model->age = '16歳';
        $model->blood_type = '不明';
        $model->height = '172cm';
        $model->weight = '不明';
        $model->detail = '雄英高校ヒーロー科。薄い金髪に赤目の三白眼が特徴的な少年。主人公である緑谷出久とは幼馴染みで彼からの呼称は「かっちゃん」。将来の夢は本人曰く、「オールマイトをも超えるトップヒーローとなり、高額納税者ランキングに名を刻むこと」完璧主義者。';
        $model->save();
        
        $model = new Character;
        $model->name = '胡蝶しのぶ';
        $model->anime_title = '鬼滅の刃';
        $model->image_name = '/storage/images/03.jpg';
        $model->character_voice = '早見沙織';
        $model->gender = '女性';
        $model->birthday = '2/24';
        $model->age = '18歳';
        $model->blood_type = '不明';
        $model->height = '151cm';
        $model->weight = '37kg';
        $model->detail = '鬼殺隊の隊士の中でも、柱と呼ばれる最上級剣士の一人。「蟲柱」の称号を持つ。不死に近い人喰い鬼の数少ない弱点である、藤の花から精製した特殊な毒によって鬼を滅殺する。';
        $model->save();
        
        $model = new Character;
        $model->name = '釘崎野薔薇';
        $model->anime_title = '呪術廻戦';
        $model->image_name = '/storage/images/04.jpg';
        $model->character_voice = '瀬戸麻沙美';
        $model->gender = '女性';
        $model->birthday = '8/7';
        $model->age = '16歳';
        $model->blood_type = '不明';
        $model->height = '160cm未満';
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
        $model->age = '17歳';
        $model->blood_type = 'AO型';
        $model->height = '181cm';
        $model->weight = '66kg';
        $model->detail = '外見はオレンジ髪に茶色の瞳を持つ青年。『一護』という名前は、何か一つのものを護り通せるように、の意味に由来している。一見すると、どこにでもいそうなごく普通の高校生だが、異常なまでに優れた霊感を持つ。正義感が強く心優しい好青年で義理堅く見返りを求めたり、卑怯な事も殆どしないタイプである。';
        $model->save();
        
        $model = new Character;
        $model->name = 'ナミ';
        $model->anime_title = 'ONE PIECE';
        $model->image_name = '/storage/images/06.jpg';
        $model->character_voice = '岡村朋美/山崎和佳奈（代役70~78話）';
        $model->gender = '女性';
        $model->birthday = '7/3';
        $model->age = '20歳';
        $model->blood_type = 'X型';
        $model->height = '170cm';
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
        $model->age = '17歳';
        $model->blood_type = '不明';
        $model->height = '160cm';
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
        $model->age = '12歳';
        $model->blood_type = 'O型';
        $model->height = '152cm';
        $model->weight = '47kg';
        $model->detail = 'テニスの王子様及び新テニスの王子様の主人公。青春学園１年生で青学のスーパールーキーとして一躍注目される。名テニスプレーヤーの父・越前南次郎から受け継いだテニスセンスとテニスの英才教育を受けて育った。プレイスタイルはオールラウンダー。得意技はツイストサーブやドライブA～D、COOLドライブ、サムライドライブなど。ダブルスは性格上の問題で向いておらず、根っからのシングルス選手である。';
        $model->save();

        $model = new Character;
        $model->name = '虎杖悠仁';
        $model->anime_title = '呪術廻戦';
        $model->image_name = '/storage/images/09.jpg';
        $model->character_voice = '榎木淳弥';
        $model->gender = '男性';
        $model->birthday = '3/20';
        $model->age = '16歳';
        $model->blood_type = '不明';
        $model->height = '173cmくらい(作者曰くどんどん伸びてる)';
        $model->weight = '80kg以上';
        $model->detail = 'ノリがよく素直で人懐こい性格で、誰に対してもフレンドリーに接することができる。その結果一風変わった相手ともすぐ打ち解けたりすることも。呪術高専の先輩たちには、初めて会ってから短時間で「善人」「呪術師には珍しい根明」と評価されている。';
        $model->save();

        $model = new Character;
        $model->name = 'エルサ';
        $model->anime_title = 'アナと雪の女王';
        $model->image_name = '/storage/images/10.jpg';
        $model->character_voice = '松たか子/イディナ・メンゼル';
        $model->gender = '女性';
        $model->birthday = '不明';
        $model->age = '21歳';
        $model->blood_type = '不明';
        $model->height = '172cm';
        $model->weight = '不明';
        $model->detail = 'アレンデール王国の第一王女で王位継承者。真面目でクール、優雅で心優しい性格。';
        $model->save();

        $model = new Character;
        $model->name = 'キティ・ホワイト';
        $model->anime_title = 'ハローキティ';
        $model->image_name = '/storage/images/11.jpeg';
        $model->character_voice = '林原めぐみ';
        $model->gender = '女性';
        $model->birthday = '11/1';
        $model->age = '不明';
        $model->blood_type = 'A型';
        $model->height = 'リンゴ5コ分';
        $model->weight = 'リンゴ3コ分';
        $model->detail = '将来の夢はピアニストか詩人。1981年に両親からグランドピアノをプレゼントされる。つけているリボンはミミィとキティをママが見分けるために付けた。大切な宝物は思い出の詰まったアルバム。尊敬している人は父（ジョージ）。';
        $model->save();

        $model = new Character;
        $model->name = 'モンキー・D・ルフィ';
        $model->anime_title = 'ONE PIECE';
        $model->image_name = '/storage/images/12.jpg';
        $model->character_voice = '田中真弓';
        $model->gender = '男性';
        $model->birthday = '5/5';
        $model->age = '19歳';
        $model->blood_type = 'F型';
        $model->height = '174cm';
        $model->weight = '不明';
        $model->detail = '海賊「麦わらの一味」船長。異名は「麦わらのルフィ」。';
        $model->save();

        $model = new Character;
        $model->name = 'ロロノア・ゾロ';
        $model->anime_title = 'ONE PIECE';
        $model->image_name = '/storage/images/13.jpg';
        $model->character_voice = '中井和哉';
        $model->gender = '男性';
        $model->birthday = '11/11';
        $model->age = '21歳';
        $model->blood_type = 'XF型';
        $model->height = '178cm';
        $model->weight = '不明';
        $model->detail = '基本的に冷静沈着で、仲間達とは一歩距離を置いた位置から物事を判断し、作戦会議などでは「吉」と「凶」の両方の可能性を考えた上での意見を出す事が多い。戦闘員というポジションから、戦局や敵方の能力の分析に長けており、一味全員で挑む大きな戦いにおいてはそれこそ副船長ばりの指揮力と行動力を発揮する。';
        $model->save();

        $model = new Character;
        $model->name = 'エレン・イェーガー';
        $model->anime_title = '進撃の巨人';
        $model->image_name = '/storage/images/14.jpg';
        $model->character_voice = '梶裕貴';
        $model->gender = '男性';
        $model->birthday = '3/30';
        $model->age = '15歳';
        $model->blood_type = '不明';
        $model->height = '170cm';
        $model->weight = '63kg';
        $model->detail = 'ぶっきらぼうで無鉄砲。直情型で猪突猛進。';
        $model->save();

        $model = new Character;
        $model->name = '雪城ほのか';
        $model->anime_title = 'ふたりはプリキュア';
        $model->image_name = '/storage/images/15.jpg';
        $model->character_voice = 'ゆかな';
        $model->gender = '女性';
        $model->birthday = '4/4';
        $model->age = '14歳';
        $model->blood_type = 'B型';
        $model->height = '不明';
        $model->weight = '不明';
        $model->detail = 'キュアホワイトに変身する。パートナーはミップル。';
        $model->save();

        $model = new Character;
        $model->name = 'ハウエル・ジェンキンス';
        $model->anime_title = 'ハウルの動く城';
        $model->image_name = '/storage/images/16.jpeg';
        $model->character_voice = '木村拓哉';
        $model->gender = '男性';
        $model->birthday = '不明';
        $model->age = '27歳';
        $model->blood_type = '不明';
        $model->height = '不明';
        $model->weight = '不明';
        $model->detail = '大胆不敵な性格の持ち主である一方で、ソフィーのミスによって己の髪の毛の色が変わってしまった事を理由に寝込んでしまったり、荒地の魔女を極度に恐れるなど脆く繊細な側面を持っている。自由を愛し、国家やサリマンに束縛される事を嫌っている。';
        $model->save();

        $model = new Character;
        $model->name = 'サン';
        $model->anime_title = 'もののけ姫';
        $model->image_name = '/storage/images/17.jpg';
        $model->character_voice = '石田ゆり子';
        $model->gender = '女性';
        $model->birthday = '不明';
        $model->age = '15歳';
        $model->blood_type = '不明';
        $model->height = '不明';
        $model->weight = '不明';
        $model->detail = '山犬の娘として森と共に生き、森が死ねば森と共に死ぬという儚い運命の中で生きていたが、ふとしたことでアシタカと出会ったことから彼女の運命もまた回りだしていく。';
        $model->save();

        $model = new Character;
        $model->name = 'ドラえもん';
        $model->anime_title = 'ドラえもん';
        $model->image_name = '/storage/images/18.png';
        $model->character_voice = '水田わさび';
        $model->gender = '雄';
        $model->birthday = '2112/9/3';
        $model->age = '不明';
        $model->blood_type = '不明';
        $model->height = '129.3cm';
        $model->weight = '129.3kg';
        $model->detail = 'ネコ型ロボット';
        $model->save();

        $model = new Character;
        $model->name = 'レゴシ';
        $model->anime_title = 'BEASTARS';
        $model->image_name = '/storage/images/19.jpg';
        $model->character_voice = '小林親弘';
        $model->gender = '雄';
        $model->birthday = '4/9';
        $model->age = '17歳';
        $model->blood_type = 'O型';
        $model->height = '185cm';
        $model->weight = '71kg';
        $model->detail = 'チェリートン学園高等部演劇部2年美術チーム照明担当。種族は食肉目イヌ科最大のハイイロオオカミ。';
        $model->save();

        $model = new Character;
        $model->name = '坂田銀時';
        $model->anime_title = '銀魂';
        $model->image_name = '/storage/images/20.jpg';
        $model->character_voice = '杉田智和';
        $model->gender = '男性';
        $model->birthday = '10/10';
        $model->age = '27歳';
        $model->blood_type = '不明';
        $model->height = '177cm';
        $model->weight = '65kg';
        $model->detail = '銀髪の天然パーマに「死んだ魚のような目」をした青年で、外見からして無気力、脱力感が感じられる。実際の所も無気力、脱力感、いい加減さの塊で、金もないのに梯子して朝帰り＆酔い潰れるなど金銭感覚も危うい。';
        $model->save();
    }
}
