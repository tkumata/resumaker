<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->string('name');
            $table->string('name_kana')->nullable();
            $table->string('email')->unique();
            $table->string('password');
            $table->dateTime('birthday')->nullable();
            $table->string('gender')->nullable();
            $table->string('img_path')->nullable();
            $table->string('zip')->nullable();
            $table->string('address')->nullable();
            $table->string('address_kana')->nullable();
            $table->string('tel1')->nullable();
            $table->string('tel2')->nullable();
            $table->string('fax')->nullable();
            $table->string('public')->nullable()->unique();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
}
