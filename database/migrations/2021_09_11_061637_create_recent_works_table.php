<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecentWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recent_works', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('category_id');
            $table->string('title')->nullable();
            $table->string('slug');
            $table->string('image')->default('default.png');
            $table->longText('description');
            $table->timestamps();
//            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('recent_works');
    }
}
