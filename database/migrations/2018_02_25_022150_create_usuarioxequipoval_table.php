<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioxequipovalTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioxequipoval', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();//RELACION CON LA TABLA users
            $table->foreign('users_id')->references('id')->on('users');//ASIGNA A LA TABLA users
            $table->integer('equipoval_id')->unsigned();//RELACION CON LA TABLA equipoval
            $table->foreign('equipoval_id')->references('id')->on('equipoval');//ASIGNA A LA TABLA equipoval
            $table->text('tipo');
            $table->text('estado');
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
        Schema::dropIfExists('usuarioxequipoval');
    }
}
