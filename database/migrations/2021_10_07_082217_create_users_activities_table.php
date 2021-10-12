<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersActivitiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_activities', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignUuid('user_id')->nullable()->index();
            $table->string('activity')->nullable()->default('login');
            $table->string('ip_address', 45)->nullable()->index();
            $table->text('user_agent')->nullable();
            $table->string('country_name')->nullable()->default('unknown');
            $table->string('country_code')->nullable()->default('unknown');
            $table->string('region_code')->nullable()->default('unknown');
            $table->string('region_name')->nullable()->default('unknown');
            $table->string('city_name')->nullable()->default('unknown');
            $table->string('zip_code')->nullable();
            $table->string('iso_code')->nullable();
            $table->string('postal_code')->nullable();
            $table->string('latitude')->nullable();
            $table->string('longitude')->nullable();
            $table->string('metro_code')->nullable();
            $table->string('area_code')->nullable();
            $table->dateTime('login_at')->nullable();
            $table->dateTime('logout_at')->nullable();
            $table->string('browser')->nullable();
            $table->string('platform')->nullable();
            $table->string('device_type')->nullable();
            $table->string('device')->nullable();
            $table->dateTime('last_activity')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users_activities');
    }
}
