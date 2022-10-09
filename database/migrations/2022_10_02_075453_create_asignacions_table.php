<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAsignacionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asignacions', function (Blueprint $table) {
            $table->id();
            $table->date('fechaInicio');
            $table->date('fechaFin');
            $table->double('rentaDiaria');
            $table->double('montoRecaudado');
            $table->double('pagoChofer');
            $table->string('detalle');
            $table->integer('idTipoAsignacion');
            $table->integer('idMicro');
            $table->integer('idChofer');
            //$table->timestamps();

            //Relaciones
            $table->foreign('idTipoAsignacion')->references('id')->on('tipo_asignaciones')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idMicro')->references('id')->on('micros')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->foreign('idChofer')->references('idPersona')->on('chofers')
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
        Schema::dropIfExists('asignacions');
    }
}
