<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKakeiboTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // kakeibo詳細情報
        Schema::create('trn_kakeibo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kakeibo_id')->nullable(false);
            $table->string('date')->nullable(false);
            $table->string('user_id')->nullable(false);
            $table->string('category')->nullable(false);
            $table->string('price')->nullable(false);
            $table->string('remarks')->nullable();
            $table->timestamps(); 
        });

        //  kakeiboとユーザーを紐付けるテーブル
        Schema::create('mst_kakeibo', function (Blueprint $table) {
            $table->string('kakeibo_id')->nullable(false);
            $table->string('user_id')->nullable(false);
            $table->string('kakeibo_password')->nullable(false);
            $table->timestamps();  
        });

        //  ユーザーマスタ
        //  ログインユーザーと紐づく様にする
        Schema::create('mst_user', function (Blueprint $table) {
            $table->bigIncrements('user_id')->nullable(false);
            $table->string('user_name')->nullable(false);
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
        Schema::dropIfExists('trn_kakeibo');
        Schema::dropIfExists('mst_kakeibo');
        Schema::dropIfExists('mst_user');
    }
}
