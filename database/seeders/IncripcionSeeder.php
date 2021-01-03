<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

use App\Models\Inscripcion;


class IncripcionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $subalterno = new Inscripcion;
        $subalterno->nombre = 'Ingreso a Escuela de Especialidades';
        $subalterno->save();

        $esnalMG = new Inscripcion;
        $esnalMG->nombre = 'Escual Naval: Marina de Guerra';
        $esnalMG->save();

        $esnalMM = new Inscripcion;
        $esnalMM->nombre = 'Escual Naval: Marina Mercante';
        $esnalMM->save();

        $bachi5c = new Inscripcion;
        $bachi5c->nombre = 'Bachillerato Naval: 5° Año Diversificación Científico';
        $bachi5c->save();

        $bachi5h = new Inscripcion;
        $bachi5h->nombre = 'Bachillerato Naval: 5° Año Diversificación Humaístico';
        $bachi5h->save();

        $bachi6m = new Inscripcion;
        $bachi6m->nombre = 'Bachillerato Naval: 6° Año Diversificación Físico-Matemático';
        $bachi6m->save();

        $bachi6e = new Inscripcion;
        $bachi6e->nombre = 'Bachillerato Naval: 6° Año Diversificación Social-Económico';
        $bachi6e->save();
    }
}
