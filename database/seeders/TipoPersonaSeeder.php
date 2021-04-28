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

        $suegro = new TipoPersona;
        $suegro->nombre = 'Suegro';
        $suegro->save();

        $suegra = new TipoPersona;
        $suegra->nombre = 'Suegra';
        $suegra->save();

        $yerno = new TipoPersona;
        $yerno->nombre = 'Yerno';
        $yerno->save();

        $nuera = new TipoPersona;
        $nuera->nombre = 'Nuera';
        $nuera->save();

        $cunado = new TipoPersona;
        $cunado->nombre = 'Cuñado';
        $cunado->save();

        $cunada = new TipoPersona;
        $cunada->nombre = 'Cuñada';
        $cunada->save();

        $tio = new TipoPersona;
        $tio->nombre = 'Tio';
        $tio->save();

        $tia = new TipoPersona;
        $tia->nombre = 'Tia';
        $tia->save();

        $sobrino = new TipoPersona;
        $sobrino->nombre = 'Sobrino';
        $sobrino->save();

        $sobrina = new TipoPersona;
        $sobrina->nombre = 'Sobrina';
        $sobrina->save();

        $bisabuelo = new TipoPersona;
        $bisabuelo->nombre = 'Bisabuelo';
        $bisabuelo->save();

        $bisabuela = new TipoPersona;
        $bisabuela->nombre = 'Bisabuela';
        $bisabuela->save();

        $otro = new TipoPersona;
        $otro->nombre = 'Otro';
        $otro->save();


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
