<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_settings', function (Blueprint $table) {
            $table->id();
            $table->uuid('user_id');
            $table->char('lang', 3)->default('en')->nullable();
            $table->string('general_theme')->nullable();
            $table->string('navbar_theme')->nullable();
            $table->string('sidebar_theme')->nullable();
            $table->timestamps();
        });

        Schema::table('users_settings', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->cascadeOnDelete();
            $table->index('user_id');
            $table->index('general_theme');
            $table->index('navbar_theme');
            $table->index('sidebar_theme');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('app_settings');
    }
}