<?php

namespace Database\Seeders;

use App\Models\Pregunta;
use Illuminate\Database\Seeder;

class PreguntaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pregunta1 = new Pregunta();
        $pregunta1->textoPregunta = 'Solicitudes de ingreso que haya realizado a Unidades o Reparticiones de FF.AA. o Policiales(Fecha y Dependencia).';
        $pregunta1->tipo_persona_id = 1;
        $pregunta1->tipo_inscripccion_id = 1;
        $pregunta1->save();

        $pregunta2 = new Pregunta();
        $pregunta2->textoPregunta = 'Si ha sido detenido, anotar Dependencia, Fecha y Causa de la o las Detenciones.';
        $pregunta2->tipo_persona_id = 14;
        $pregunta2->tipo_inscripccion_id = 1;
        $pregunta2->save();

        $pregunta3 = new Pregunta();
        $pregunta3->textoPregunta = 'Si ha consumido o Consume Psicofarmacos o drogas alucinogenas, por prescripcion medica o uso personal - Nombre de la misma y fecha de consumo';
        $pregunta3->tipo_persona_id = 1;
        $pregunta3->tipo_inscripccion_id = 1;
        $pregunta3->save();

        $pregunta4 = new Pregunta();
        $pregunta4->textoPregunta = 'Esta o estuvo en tratamiento por algun tipo de adiccion igual o diferente a las anteriores? - especifique';
        $pregunta4->tipo_persona_id = 1;
        $pregunta4->tipo_inscripccion_id = 1;
        $pregunta4->save();
    }
}
