<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePendingteachersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pendingteachers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('email');
            $table->string('subject_attached')->nullable();
            $table->string('status');
            $table->string('name');
            $table->string('cv');
            $table->text('about');
            $table->string('subject')->nullable();
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
        Schema::dropIfExists('pendingteachers');
    }
}
