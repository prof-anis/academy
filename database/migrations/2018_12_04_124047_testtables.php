<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Testtables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tests', function (Blueprint $table) {
            $table->increments('id');
            $table->string('teachers_id');
            $table->string('student_id')->nullable();
            $table->string('status');
            $table->string('subject');
            $table->string('topic');
            $table->string('time');
            $table->string('question_no');
            $table->string('is_retake')->nullable();
            $table->string('prevId')->nullable();
            $table->string('expire')->nullable();
            $table->string('name')->nullable();
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
        Schema::dropIfExists('tests');
    }
}
