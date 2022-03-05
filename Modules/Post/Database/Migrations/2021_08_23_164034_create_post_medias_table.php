<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostMediasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('post_medias', function (Blueprint $table) {
            $table->id();
            $table->uuid('posts_id');
            $table->string('type')->nullable();
            $table->string('media_thumbnail')->nullable();
            $table->string('media_type')->nullable();
            $table->string('media_path')->nullable();
            $table->string('media_source')->nullable();
            $table->timestamps();

            $table->foreign('posts_id')->references('id')->on('posts')->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('post_medias');
    }
}
