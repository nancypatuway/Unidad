<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlangestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('plangestion', function (Blueprint $table) {

            $table->increments('id');
            
            $table->integer('planificacion_id')->unsigned();//RELACION CON LA TABLA planificacion
            $table->foreign('planificacion_id')->references('id')->on('planificacion');//ASIGNA A LA TABLA planificacion
            $table->string('codplangestion')->unique();
            $table->text('riesgoasociado');
            $table->text('accionmejora');
            $table->text('plazo');
            $table->text('finicio');
            $table->text('ffin');
            $table->text('accionesrealizadas');
            $table->text('avance');
            $table->text('justificacion');
            $table->string('token');
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
        Schema::dropIfExists('plangestion');
    }
}
