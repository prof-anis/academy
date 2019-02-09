<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Questiontables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('questionbanks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('question');
            $table->string('type');
            $table->string('a');
            $table->string('b');
            $table->string('c');
            $table->string('d');
            $table->string('ans');
            $table->string('teachers_id');
            $table->string('test_id');
           // $table->string('subject');
            $table->string('topic');

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
        Schema::dropIfExists('questionbanks');
    }
}
