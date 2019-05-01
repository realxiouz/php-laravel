<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateArticlesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('articles', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title', 100)->comment('文章标题');
            $table->text('body')->comment('文章内容');
            $table->boolean('markdown')->default(true)->comment('markdown格式');
            $table->integer('views')->nullable()->comment('浏览量');
            $table->integer('tag_id')->nullable()->comment('文章标签');
            $table->integer('user_id')->comment('作者');
            $table->integer('article_group_id')->nullable()->comment('系列');
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
        Schema::dropIfExists('articles');
    }
}
