<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(DepartamentoSeeder::class);
        $this->call(EstadoCivilSeeder::class);
        $this->call(InscripcionSeeder::class);
        $this->call(PaisSeeder::class);
        $this->call(TipoEstudioSeeder::class);
        $this->call(TipoPersonaSeeder::class);
        $this->call(ciudadbarrioSeeder::class);

    }
}
