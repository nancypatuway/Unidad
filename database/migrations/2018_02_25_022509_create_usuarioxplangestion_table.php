<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsuarioxplangestionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('usuarioxplangestion', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('users_id')->unsigned();//RELACION CON LA TABLA users
            $table->foreign('users_id')->references('id')->on('users');//ASIGNA A LA TABLA users
            $table->integer('plangestion_id')->unsigned();//RELACION CON LA TABLA plangestion
            $table->foreign('plangestion_id')->references('id')->on('plangestion');//ASIGNA A LA TABLA plangestion
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
        Schema::dropIfExists('usuarioxplangestion');
    }
}
