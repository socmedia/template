<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBannersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('banners', function (Blueprint $table) {
            $table->id();
            $table->string('banner_type');
            $table->string('name');
            $table->string('desktop_media_path');
            $table->string('mobile_media_path');
            $table->string('placement_route');
            $table->string('alt')->nullable();
            $table->text('references_url')->nullable();
            $table->unsignedBigInteger('position');
            $table->boolean('is_active')->default(1);
            $table->string('desktop_background_position')->default('center center')->nullable();
            $table->string('mobile_background_position')->default('center center')->nullable();
            $table->boolean('with_caption')->default(0)->nullable();
            $table->string('caption_title')->nullable();
            $table->text('caption_text')->nullable();
            $table->boolean('with_button')->default(0)->nullable();
            $table->string('button_text')->default('Jelajahi')->nullable();
            $table->string('button_link')->nullable();
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
        Schema::dropIfExists('banners');
    }
}