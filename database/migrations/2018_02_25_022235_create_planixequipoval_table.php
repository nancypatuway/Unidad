<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlanixequipovalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('planixequipoval', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('planificacion_id')->unsigned();//RELACION CON LA TABLA planificacion
            $table->foreign('planificacion_id')->references('id')->on('planificacion');//ASIGNA A LA TABLA planificacion
            $table->integer('equipoval_id')->unsigned();//RELACION CON LA TABLA equipoval
            $table->foreign('equipoval_id')->references('id')->on('equipoval');//ASIGNA A LA TABLA equipoval
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
        Schema::dropIfExists('planixequipoval');
    }
}
