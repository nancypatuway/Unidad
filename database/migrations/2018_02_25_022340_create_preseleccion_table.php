<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePreseleccionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('preseleccion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('portafolioriesgo_id')->unsigned();//RELACION CON LA TABLA portafolioriesgo
            $table->foreign('portafolioriesgo_id')->references('id')->on('portafolioriesgo');//ASIGNA A LA TABLA portafolioriesgo
            $table->integer('planificacion_id')->unsigned();//RELACION CON LA TABLA planificacion
            $table->foreign('planificacion_id')->references('id')->on('planificacion');//ASIGNA A LA TABLA planificacion
            $table->text('aplica');
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
        Schema::dropIfExists('preseleccion');
    }
}
