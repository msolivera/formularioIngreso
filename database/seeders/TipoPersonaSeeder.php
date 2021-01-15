<?php

namespace Database\Seeders;

use  App\Models\TipoPersona;
use Illuminate\Database\Seeder;


class TipoPersonaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $postulante = new TipoPersona;
        $postulante->nombre = 'Postulante';
        $postulante->save();

        $madre = new TipoPersona;
        $madre->nombre = 'Madre';
        $madre->save();

        $padre = new TipoPersona;
        $padre->nombre = 'Padre';
        $padre->save();

        $abuelo = new TipoPersona;
        $abuelo->nombre = 'Abuelo';
        $abuelo->save();

        $abuela = new TipoPersona;
        $abuela->nombre = 'Abuela';
        $abuela->save();

        $hermano = new TipoPersona;
        $hermano->nombre = 'Hermano';
        $hermano->save();

        $hermana = new TipoPersona;
        $hermana->nombre = 'Hermana';
        $hermana->save();

        $hijo = new TipoPersona;
        $hijo->nombre = 'Hijo';
        $hijo->save();

        $hija = new TipoPersona;
        $hija->nombre = 'Hija';
        $hija->save();

        $conyuge_concubino_novio = new TipoPersona;
        $conyuge_concubino_novio->nombre = 'Conyuge, Concubino/a, Novio/a';
        $conyuge_concubino_novio->save();

        $referente = new TipoPersona;
        $referente->nombre = 'Referente';
        $referente->save();

        $tutor = new TipoPersona;
        $tutor->nombre = 'Tutor';
        $tutor->save();

        $tutorLegal = new TipoPersona;
        $tutorLegal->nombre = 'Tutor Legal';
        $tutorLegal->save();

        $varios04 = new TipoPersona;
        $varios04->nombre = 'Postulante, madre, padre y pareja';
        $varios04->save();
    }
}
