<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstudioPersonaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estudioPersona', function (Blueprint $table) {
            $table->id();
            $table->string('anioEstudio');
            $table->string('nombreInstituto');
            $table->unsignedInteger('persona_id')->nullable();
            $table->unsignedInteger('tipo_estudio_id')->nullable();
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
        Schema::dropIfExists('EstudioPersona');
    }
}
