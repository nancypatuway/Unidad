<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioxdependenciaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioxdependencia', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();//RELACION CON LA TABLA users
            $table->foreign('users_id')->references('id')->on('users');//ASIGNA A LA TABLA users
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
        Schema::dropIfExists('usuarioxdependencia');
    }
}
