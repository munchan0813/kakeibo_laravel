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
        Schema::create('trn_kakeibo', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('kakeibo_id')->nullable(false);
            $table->string('date')->nullable(false);
            $table->string('payer')->nullable(false);
            $table->string('category')->nullable(false);
            $table->string('price')->nullable(false);
            $table->string('remarks')->nullable();
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
        Schema::dropIfExists('kakeibo');
    }
}
