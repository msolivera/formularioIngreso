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
        Schema::create('persona', function (Blueprint $table) {
            $table->id();
            $table->string('primerNombre');
            $table->string('segundoNombre')->nullable();
            $table->string('primerApellido');
            $table->string('segundoApellido')->nullable();
            $table->string('apodo')->nullable();
            $table->string('fallecido')->nullable();
            $table->string('fechaNacimiento');
            $table->string('fechaDefuncion')->nullable();
            $table->integer('cedula')->nullable();
            $table->string('credencialSerie')->nullable();
            $table->integer('credencialNumero')->nullable();
            $table->string('sexo')->nullable();
            $table->string('identidadGenero')->nullable();
            $table->string('raza')->nullable();
            $table->string('domicilioActual')->nullable();
            $table->integer('telefono_celular')->nullable();
            $table->string('domicilioAnterior')->nullable();
            $table->string('correoElectronico')->nullable();
            $table->string('seccionalPolicial')->nullable();
            $table->boolean('ingresado')->default(false);
            //FKs
            $table->unsignedInteger('tipo_persona_id')->nullable();
            $table->unsignedInteger('inscripcion_id')->nullable();
            $table->unsignedInteger('pais_id')->nullable();
            $table->unsignedInteger('departamento_id')->nullable();
            $table->unsignedInteger('estadoCivil_id')->nullable();
            $table->unsignedInteger('ciudadBarrio_id')->nullable();


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
        Schema::dropIfExists('persona');
    }
}
