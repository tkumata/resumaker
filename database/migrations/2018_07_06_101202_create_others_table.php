<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOthersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('others', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('others_users_id')->nullable();
            $table->dateTime('others_date')->nullable();
            $table->text('others_hobby')->nullable();
            $table->text('others_special')->nullable();
            $table->text('others_reason')->nullable();
            $table->text('others_pr')->nullable();
            $table->text('others_expectation')->nullable();
            $table->text('others_notes')->nullable();
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
        Schema::dropIfExists('others');
    }
}
