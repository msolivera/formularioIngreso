<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TipoEstudio;

class TipoEstudioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $primaria = new TipoEstudio();
        $primaria->nombre = 'Primaria';
        $primaria->save();

        $cicloBasico = new TipoEstudio();
        $cicloBasico->nombre = 'Ciclo Basico';
        $cicloBasico->save();

        $bachillerato = new TipoEstudio();
        $bachillerato->nombre = 'Bachillerato';
        $bachillerato->save();

        $otro = new TipoEstudio();
        $otro->nombre = 'Otro Estudio';
        $otro->save();
    }
}
