<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('subject');
            $table->string('status');
            $table->string('start_date');
            $table->string('description');

            $table->unsignedBigInteger('severity_id');
            //$table->unsignedBigInteger('user_id')->nullable();
            $table->timestamps();
            $table->foreign('severity_id')->references('id')->on('severities');
           // $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
