<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\EstadoCivil;

class EstadoCivilSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**
         *Soltero/a
         *Casado/a
         *Unión concubinaria
         *Divorciado/a
         *Viudo/a.
         */

        $soltero = new EstadoCivil();
        $soltero->nombre = 'Soltero/a';
        $soltero->save();

        $casado = new EstadoCivil();
        $casado->nombre = 'Casado/a';
        $casado->save();

        $concubino = new EstadoCivil();
        $concubino->nombre = 'Unión concubinaria';
        $concubino->save();

        $divorciado = new EstadoCivil();
        $divorciado->nombre = 'Divorciado/a';
        $divorciado->save();

        $viudo = new EstadoCivil();
        $viudo->nombre = 'Viudo/a';
        $viudo->save();
    }
}
