<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCharactersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('characters', function (Blueprint $table) {
            $table->id();
            $table->string('name')->comment('キャラクター名');
            $table->string('anime_title')->comment('出演作品名');
            $table->text('image_name')->default('storage/images/default.jpg')->comment('画像名');
            $table->string('gender')->comment('性別');
            $table->date('birthday')->nullable()->comment('誕生日');
            $table->integer('age')->default(0)->comment('年齢');
            $table->string('blood_type')->default('不明')->comment('血液型');
            $table->string('height')->default('不明')->comment('身長');
            $table->string('weight')->default('不明')->comment('体重');
            $table->string('character_voice')->default('')->comment('声優');
            $table->longText('detail')->default('')->comment('詳細');
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('characters');
    }
}
