<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->string('title')->unique()->index();
            $table->string('slug_title')->unique()->index();
            $table->unsignedBigInteger('type_id')->nullable();
            $table->string('subject')->nullable()->index();
            $table->string('thumbnail');
            $table->longText('description')->nullable();
            $table->text('tags')->nullable();
            $table->string('reading_time')->nullable(); // 2.16 word/sec (average)
            $table->bigInteger('number_of_views')->default(0);
            $table->bigInteger('number_of_shares')->default(0);
            $table->uuid('author')->nullable();
            $table->dateTime('published_at')->nullable();
            $table->dateTime('archived_at')->default(null)->nullable();

            $table->timestamps();
            $table->softDeletes();

        });

        Schema::table('posts', function ($table) {
            $table->foreign('category_id')->references('id')->on('categories')->nullOnDelete();
            $table->foreign('type_id')->references('id')->on('post_types')->nullOnDelete();
            $table->foreign('author')->references('id')->on('users')->nullOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}