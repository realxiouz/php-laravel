<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSaysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('says', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id')->comment('发布者');
            $table->char('content', 100)->nullable()->comment('说说内容');
            $table->char('img', 100)->nullable()->comment('图片');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('says');
    }
}
