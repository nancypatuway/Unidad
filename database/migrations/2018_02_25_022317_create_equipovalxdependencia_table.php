<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquipovalxdependenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipovalxdependencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('equipoval_id')->unsigned();//RELACION CON LA TABLA equipoval
            $table->foreign('equipoval_id')->references('id')->on('equipoval');//ASIGNA A LA TABLA equipoval
            $table->integer('dependencia_id')->unsigned();//RELACION CON LA TABLA dependencia
            $table->foreign('dependencia_id')->references('id')->on('dependencia');//ASIGNA A LA TABLA dependencia
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
        Schema::dropIfExists('equipovalxdependencia');
    }
}
