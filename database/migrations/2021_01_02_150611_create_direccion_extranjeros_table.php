<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDireccionExtranjerosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('direccion_extranjeros', function (Blueprint $table) {
            $table->id();
            $table->string('nombre_departamento_estado');
            $table->string('nombre_ciudad');
            $table->unsignedInteger('pais_id')->nullable();
            $table->unsignedInteger('persona_id')->nullable();
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
        Schema::dropIfExists('direccion_extranjeros');
    }
}
