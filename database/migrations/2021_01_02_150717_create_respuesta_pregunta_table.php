<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRespuestaPreguntaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('respuestaPregunta', function (Blueprint $table) {
            $table->id();
            $table->string('respuesta');
            $table->string('observaciones')->nullable();
            $table->unsignedInteger('persona_id');
            $table->unsignedInteger('pregunta_id');
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
        Schema::dropIfExists('RespuestaPregunta');
    }
}
