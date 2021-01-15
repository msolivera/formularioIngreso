<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pregunta', function (Blueprint $table) {
            $table->id();
            $table->string('textoPregunta')->unique();
            $table->unsignedInteger('tipo_persona_id')->nullable();
            $table->unsignedInteger('tipo_inscripccion_id')->nullable();

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
        Schema::dropIfExists('Pregunta');
    }
}
