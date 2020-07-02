<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlatformsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('platforms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('video_id')->unsigned();
            $table->string('platform_name', 500);
            $table->string('vod_id', 100)->nullable();
            $table->string('vod_title', 500)->nullable();
            $table->text('vod_description')->nullable();
            $table->string('vod_url', 500)->nullable();
            $table->string('vod_provider', 500)->nullable();
            $table->timestamp('on_at')->nullable();
            $table->timestamp('off_at')->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();

            $table->foreign('video_id')->references('id')->on('videos')->onDelete('cascade');
            $table->index('vod_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('platforms');
    }
}
