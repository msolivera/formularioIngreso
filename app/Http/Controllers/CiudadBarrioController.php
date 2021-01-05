<?php

namespace App\Http\Controllers;

use App\Models\CiudadBarrio;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class CiudadBarrioController extends Controller
{
    use ApiResponses;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * retorna lista de paises
     */
    public function index()
    {

        $ciudad_barrio = CiudadBarrio::all();

        return $this->successResponse($ciudad_barrio);
    }



    /**
     * crea instancia de ciudad_barrio
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required',
            'departamento_id' => 'required'
        ];

        $this->validate($request, $rules);

        $ciudad_barrio = CiudadBarrio::create($request->all());

        return $this->successResponse($ciudad_barrio, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un ciudad_barrio en particular
     */
    public function show($ciudad_barrio)
    {

        $ciudad_barrio = CiudadBarrio::findOrFail($ciudad_barrio);

        return $this->successResponse($ciudad_barrio);
    }

    /**
     * actualiza informacion de un ciudad_barrio
     */
    public function update(Request $request, $ciudad_barrio)
    {

        $rules = [
            'nombre' => 'required|min:5',
            'departamento_id' => 'required',
        ];
        $this->validate($request, $rules);
        $ciudad_barrio  = CiudadBarrio::findOrFail($ciudad_barrio);

        $ciudad_barrio->fill($request->all());
        if ($ciudad_barrio->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $ciudad_barrio->save();
        return $this->successResponse($ciudad_barrio);
    }


    /**
     * remueve un ciudad_barrio
     */
    public function destroy($ciudad_barrio)
    {

        $ciudad_barrio = CiudadBarrio::findOrFail($ciudad_barrio);
        $ciudad_barrio->delete();

        return $this->successResponse($ciudad_barrio);
    }
}
