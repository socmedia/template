<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();

            // information
            $table->string('place_of_brith')->nullable();
            $table->date('date_of_brith')->nullable();
            $table->text('bio')->nullable();
            $table->string('gender')->nullable();
            $table->char('area_code', 4)->default('+62')->nullable();
            $table->string('phone')->nullable();
            $table->char('province_id', 2)->nullable(); // provinsi
            $table->char('regency_id', 4)->nullable(); // kota/kab
            $table->char('district_id', 7)->nullable(); // kecamatan
            $table->text('address')->nullable();
            $table->text('login_info')->nullable(); // json array or php array

            // settings
            $table->string('avatar_url')->nullable();
            $table->boolean('allow_shares')->nullable();
            $table->boolean('private_mode')->nullable();

            // social medias
            $table->string('facebook')->nullable();
            $table->string('instagram')->nullable();
            $table->string('linkedin')->nullable();
            $table->string('tiktok')->nullable();

            // permission
            $table->date('approved_at')->nullable();
            $table->uuid('approved_by')->nullable();
            $table->text('deactivated_reasons')->nullable();
            $table->date('deactivated_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });

        Schema::table('users', function (Blueprint $table) {
            $table->index('name');
            $table->index('email');
            $table->index('phone');
            $table->index('province_id');
            $table->index('regency_id');
            $table->index('district_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}