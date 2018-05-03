<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAnayevaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('anayeva', function (Blueprint $table) {
            $table->increments('id');
            
            $table->integer('plangestion_id')->unsigned()->nullable();//RELACION CON LA TABLA plangestion
            $table->foreign('plangestion_id')->references('id')->on('plangestion');//ASIGNA A LA TABLA plangestion

            $table->integer('planificacion_id')->unsigned();//RELACION CON LA TABLA planificacion
            $table->foreign('planificacion_id')->references('id')->on('planificacion');//ASIGNA A LA TABLA
            $table->integer('portafolio_id')->unsigned();//RELACION CON LA TABLA planificacion
            $table->foreign('portafolio_id')->references('id')->on('portafolioriesgo');//ASIGNA A LA TABLA planificacion


            $table->integer('users_id')->unsigned();//RELACION CON LA TABLA users
            $table->foreign('users_id')->references('id')->on('users');//ASIGNA A LA TABLA users

            $table->text('modprobabilidad')->nullable();
            $table->text('modimpacto')->nullable();
            $table->decimal('probabilidad2',16,2)->nullable();
            $table->decimal('impacto2',16,2)->nullable();
            $table->decimal('riesgoresidual',16,2)->nullable();

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
        Schema::dropIfExists('anayeva');
    }
}
