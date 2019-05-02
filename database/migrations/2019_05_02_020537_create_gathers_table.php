<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGathersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gathers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->char('title', 100)->comment('标题');
            $table->char('tag', 20)->comment('标签');
            $table->text('body')->comment('内容');
            $table->char('origin', 100)->nullable()->comment('原始url');
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
        Schema::dropIfExists('gathers');
    }
}
