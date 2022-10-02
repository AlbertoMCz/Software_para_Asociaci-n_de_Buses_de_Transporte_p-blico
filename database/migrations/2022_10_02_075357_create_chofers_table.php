<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChofersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('chofers', function (Blueprint $table) {
            //$table->bigIncrements('id');
            //$table->id();
            $table->integer('idPersona');
            $table->string('nroLicencia');
            $table->char('categoria');
            $table->char('disponible');
            //$table->integer('persona_id');

            //Relacion
            $table->foreign('idPersona')->references('id')->on('personas')
                ->onDelete('cascade')
                ->onUpdate('cascade');
            $table->primary('idPersona');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('chofers');
    }
}
