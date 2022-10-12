<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMicrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('micros', function (Blueprint $table) {
            $table->id();
            $table->string('nroPlaca');
            $table->integer('nroInterno');
            $table->string('marca');
            $table->string('modelo');
            $table->char('disponible');
            $table->string('descripcion');
            $table->integer('idSocio');

            //Relacion
            $table->foreign('idSocio')->references('id')->on('socios')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('micros');
    }
}
