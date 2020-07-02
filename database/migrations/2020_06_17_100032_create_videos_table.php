<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateVideosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('videos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title', 500);
            $table->string('title_en', 500)->nullable();
            $table->text('description')->nullable();
            $table->text('description_en')->nullable();
            $table->year('year')->nullable();
            $table->string('poster_url', 2083)->nullable();
            $table->string('imdb_id', 100)->nullable();
            $table->string('atmovies_id', 100)->nullable();
            $table->string('douban_id', 100)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();

            $table->index('title');
            $table->index('title_en');
            $table->index('imdb_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('videos');
    }
}
