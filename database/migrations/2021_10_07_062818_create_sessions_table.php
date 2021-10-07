<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            // $table->string('country_name')->nullable();
            // $table->string('country_code')->nullable();
            // $table->string('region_code')->nullable();
            // $table->string('region_name')->nullable();
            // $table->string('city_name')->nullable();
            // $table->string('zip_code')->nullable();
            // $table->string('iso_code')->nullable();
            // $table->string('postal_code')->nullable();
            // $table->string('latitude')->nullable();
            // $table->string('longitude')->nullable();
            // $table->string('metro_code')->nullable();
            // $table->string('area_code')->nullable();
            $table->text('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sessions');
    }
}