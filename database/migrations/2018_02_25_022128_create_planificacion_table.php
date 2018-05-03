<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planificacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();//RELACION CON LA TABLA users
            $table->foreign('users_id')->references('id')->on('users');//ASIGNA A LA TABLA users
            $table->string('fecha');
            $table->integer('periodo');
            $table->string('codplanificacion')->unique();
            $table->string('tipoplanificacion');
            $table->text('nombre');
            $table->text('objetivo');
            //$table->text('alineamiento');
            $table->text('condicionesexterno');
            $table->text('condicionesinterno');
            $table->text('sujetosrelacionados');
            $table->text('areasrelacionadas');
            $table->text('entradas');
            $table->binary('diagramaflujo'); //revisar esto si se hace un refresh
            $table->text('salida');
            $table->text('indicadoresproceso');
            $table->text('normativainterna');
            $table->text('normativaexterna');
            $table->text('evaluacionesanteriores');
            $table->boolean('finalizado','false')->default(0);
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
        Schema::dropIfExists('planificacion');
    }
}
