<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentusersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidentusers', function (Blueprint $table) {
            
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('incident_id')->nullable();

            $table->timestamps();
            
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('incident_id')->references('id')->on('incidents');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidentusers');
    }
}
