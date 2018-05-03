<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMedidaspropuestasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medidaspropuestas', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('anayeva_id')->unsigned();//RELACION CON LA TABLA anayeva
            $table->foreign('anayeva_id')->references('id')->on('anayeva');//ASIGNA A LA TABLA anayeva

            $table->text('detalle');
            $table->text('validacion');
            $table->text('nivelriesgo');
            $table->text('observaciones');
            
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
        Schema::dropIfExists('medidaspropuestas');
    }
}
