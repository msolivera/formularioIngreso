<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Persona', function (Blueprint $table) {
            $table->id();
            $table->string('primerNombre');
            $table->string('segundoNombre')->nullable();
            $table->string('primerApellido');
            $table->string('segundoApellido')->nullable();
            $table->string('apodo')->nullable();
            $table->date('fechaNacimiento');
            $table->integer('cedula')->nullable();
            $table->string('credencialSerie')->nullable();
            $table->integer('credencialNumero')->nullable();
            $table->string('domicilioActual')->nullable();
            $table->integer('telefono_celular')->nullable();
            $table->string('domicilioAnterior')->nullable();
            $table->string('correoElectronico')->nullable();
            $table->string('seccionalPolicial')->nullable();
            $table->boolean('ingresado')->default(false);
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
        Schema::dropIfExists('Persona');
    }
}
