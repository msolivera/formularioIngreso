<?php

namespace Database\Seeders;

use App\Models\CiudadBarrio;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

class ciudadbarrioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
{
    DB::table('ciudad_barrio')->delete();
    $json = File::get("documentacion/ciudad_barrio.json");
    $data = json_decode($json);
    foreach ($data as $obj) {
        CiudadBarrio::create(array(
            'nombre' => $obj->nombre,
            'departamento_id' => $obj->departamento_id,
            
        ));
    }
}
}
