<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionesSancionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignaciones_sanciones', function (Blueprint $table) {
            //Primary Keys (foreign keys)
            $table->integer('idAsignacion');
            $table->integer('idSancion');

            //Atributos
            //$table->time('horaSalida');
            //$table->time('horaLlegada');
            $table->string('motivo');

            //Relaciones
            $table->foreign('idAsignacion')->references('id')->on('asignacions')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idSancion')->references('id')->on('sancions')
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
        //Schema::dropIfExists('asignaciones_sanciones');
        Schema::dropIfExists('asignacions');
        Schema::dropIfExists('sancions');
    }
}
