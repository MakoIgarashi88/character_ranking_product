<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParametersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parameters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('character_id')->comment('キャラクターID');
            // 雰囲気
            $table->integer('cute')->default(1)->comment('かわいさ');
            $table->integer('cool')->default(1)->comment('かっこよさ');
            $table->integer('wild')->default(1)->comment('ワイルドさ');
            $table->integer('beautiful')->default(1)->comment('美しさ');
            $table->integer('fresh')->default(1)->comment('さわやか');

            // 性格
            $table->integer('kind')->default(1)->comment('優しさ');
            $table->integer('gentle')->default(1)->comment('穏やかさ');
            $table->integer('quiet')->default(1)->comment('おとなしさ');
            $table->integer('active')->default(1)->comment('活発');
            $table->integer('scare')->default(1)->comment('怖い');

            // 戦闘力
            $table->integer('action')->default(1)->comment('行動力');
            $table->integer('power')->default(1)->comment('筋力');
            $table->integer('speed')->default(1)->comment('すばやさ');
            $table->integer('strategy')->default(1)->comment('戦略');
            $table->integer('endurance')->default(1)->comment('忍耐');
            
            // 知性
            $table->integer('logic')->default(1)->comment('論理的');
            $table->integer('knowledge')->default(1)->comment('博識');
            $table->integer('vocabulary')->default(1)->comment('語彙力');
            $table->integer('forecast')->default(1)->comment('予測');
            $table->integer('memory')->default(1)->comment('記憶力');

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
        Schema::dropIfExists('parameters');
    }
}
