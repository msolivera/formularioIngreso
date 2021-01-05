<?php

namespace App\Http\Controllers;

use App\Models\TipoEstudio;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class TipoEstudioController extends Controller
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
     * retorna lista de los tipos de estudio
     */
    public function index()
    {

        $tipoEstudio = TipoEstudio::all();

        return $this->successResponse($tipoEstudio);
    }



    /**
     * crea instancia de tipoEstudio
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|unique:tipoestudio',
        ];

        $this->validate($request, $rules);

        $tipoEstudio = TipoEstudio::create($request->all());

        return $this->successResponse($tipoEstudio, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un tipoEstudio en particular
     */
    public function show($tipoEstudio)
    {

        $tipoEstudio = TipoEstudio::findOrFail($tipoEstudio);

        return $this->successResponse($tipoEstudio);
    }

    /**
     * actualiza informacion de un tipoEstudio
     */
    public function update(Request $request, $tipoEstudio)
    {

        $rules = [
            'nombre' => 'required|unique:tipoestudio|min:5',
        ];
        $this->validate($request, $rules);
        $tipoEstudio  = TipoEstudio::findOrFail($tipoEstudio);

        $tipoEstudio->fill($request->all());
        if ($tipoEstudio->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $tipoEstudio->save();
        return $this->successResponse($tipoEstudio);
    }


    /**
     * remueve un tipoEstudio
     */
    public function destroy($tipoEstudio)
    {

        $tipoEstudio = TipoEstudio::findOrFail($tipoEstudio);
        $tipoEstudio->delete();

        return $this->successResponse($tipoEstudio);
    }
}
