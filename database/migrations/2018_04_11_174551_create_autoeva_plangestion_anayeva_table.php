<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoevaPlangestionAnayevaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoeva_plangestion_anayeva', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('autoevaluacion_id')->unsigned();//RELACION CON LA TABLA autoevaluacion
            $table->foreign('autoevaluacion_id')->references('id')->on('autoevaluacion');//ASIGNA A LA TABLA autoevaluacion
            $table->integer('anayeva_id')->unsigned();//RELACION CON LA TABLA anayeva
            $table->foreign('anayeva_id')->references('id')->on('anayeva');//ASIGNA A LA TABLA anayeva
            
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
        Schema::dropIfExists('autoeva_plangestion_anayeva');
    }
}
