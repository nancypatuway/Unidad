<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCalificacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('calificacion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anayeva_id')->unsigned();//RELACION CON LA TABLA anayeva
            $table->foreign('anayeva_id')->references('id')->on('anayeva');//ASIGNA A LA TABLA anayeva

            $table->integer('equipoval_id')->unsigned();//RELACION CON LA TABLA anayeva
            $table->foreign('equipoval_id')->references('id')->on('equipoval');//ASIGNA A LA TABLA anayeva
            
            $table->decimal('probablidad',16,2);
            $table->decimal('impacto',16,2);
            $table->decimal('promprobabilidad',16,2);
            $table->decimal('promimpacto',16,2);
            $table->decimal('riesgoinherente',16,2);
            
            
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
        Schema::dropIfExists('calificacion');
    }
}
