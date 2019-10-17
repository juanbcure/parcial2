<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaDireccion extends Migration
{
    public function up()
    {
        Schema::create('direcion', function (Blueprint $table) {
            $table->increments('id');
            $table->string('ubicacion');
            $table->string('barrio');
            $table->string('ciudad');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')
            ->references('id')
            ->on('usuario')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('direcion');
    }
}
