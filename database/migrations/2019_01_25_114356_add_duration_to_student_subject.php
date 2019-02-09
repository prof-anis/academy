<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddDurationToStudentSubject extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('studentsubjects', function (Blueprint $table) {
            //
           $table->string('duration')->nullable();
             $table->string('status')->nullable();//either live or expired
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('studentsubjects', function (Blueprint $table) {
           
        });
    }
}
