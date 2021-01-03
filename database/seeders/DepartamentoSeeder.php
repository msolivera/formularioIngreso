<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Departamento;

class DepartamentoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $Artigas = new Departamento();
        $Artigas->nombre = 'Artigas';
        $Artigas->save();

        $Canelones = new Departamento();
        $Canelones->nombre = 'Canelones';
        $Canelones->save();

        $CerroLargo = new Departamento();
        $CerroLargo->nombre = 'Cerro Largo';
        $CerroLargo->save();

        $Colonia = new Departamento();
        $Colonia->nombre = 'Colonia';
        $Colonia->save();

        $Durazno = new Departamento();
        $Durazno->nombre = 'Durazno';
        $Durazno->save();

        $Flores = new Departamento();
        $Flores->nombre = 'Flores';
        $Flores->save();

        $Florida = new Departamento();
        $Florida->nombre = 'Florida';
        $Florida->save();

        $Lavalleja = new Departamento();
        $Lavalleja->nombre = 'Lavalleja';
        $Lavalleja->save();

        $Maldonado = new Departamento();
        $Maldonado->nombre = 'Maldonado';
        $Maldonado->save();

        $Montevideo = new Departamento();
        $Montevideo->nombre = 'Montevideo';
        $Montevideo->save();

        $Paysandú = new Departamento();
        $Paysandú->nombre = 'Paysandú';
        $Paysandú->save();

        $RíoNegro = new Departamento();
        $RíoNegro->nombre = 'Río Negro';
        $RíoNegro->save();

        $Rivera = new Departamento();
        $Rivera->nombre = 'Rivera';
        $Rivera->save();

        $Rocha = new Departamento();
        $Rocha->nombre = 'Rocha';
        $Rocha->save();

        $Salto = new Departamento();
        $Salto->nombre = 'Salto';
        $Salto->save();

        $SanJosé = new Departamento();
        $SanJosé->nombre = 'San José';
        $SanJosé->save();

        $Soriano = new Departamento();
        $Soriano->nombre = 'Soriano';
        $Soriano->save();

        $Tacuarembó = new Departamento();
        $Tacuarembó->nombre = 'Tacuarembó';
        $Tacuarembó->save();

        $TreintaTres = new Departamento();
        $TreintaTres->nombre = 'Treinta y Tres';
        $TreintaTres->save();
    }
}
