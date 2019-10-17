<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CrearTablaEmpleado extends Migration
{
    public function up()
    {
        Schema::create('empleado', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('comoras_id')->unsigned();
            $table->integer('producto_id')->unsigned();
            $table->foreign('compras_id')
            ->references('id')
            ->on('compras')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreign('producto_id')
            ->references('id')
            ->on('producto')
            ->onDelete('cascade')
            ->onUpdate('cascade'); 
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('empleado');
    }
}
