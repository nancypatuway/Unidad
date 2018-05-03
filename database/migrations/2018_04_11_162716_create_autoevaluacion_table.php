<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAutoevaluacionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('autoevaluacion', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('planificacion_id')->unsigned();//RELACION CON LA TABLA planificacion
            $table->foreign('planificacion_id')->references('id')->on('planificacion');//ASIGNA A LA TABLA planificacion
            
            $table->text('consecutivoauto');
            $table->text('medidascontrolauto');
            $table->decimal('ponderacionauto',16,2);
            $table->decimal('cumplimientoauto',16,2);
            $table->decimal('efectividadauto',16,2);
            $table->decimal('calificacionauto',16,2);
            $table->decimal('calificacionponderacionauto',16,2);
            $table->text('riesgoasociadoauto');
            $table->text('observacionauto');
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
        Schema::dropIfExists('autoevaluacion');
    }
}
