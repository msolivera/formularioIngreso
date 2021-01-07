<?php

namespace App\Http\Controllers;

use App\Models\TipoPersona;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class TipoPersonaController extends Controller
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
     * retorna lista de Tipos de personas
     */
    public function index()
    {

        $tipos = TipoPersona::all();

        return $this->successResponse($tipos);
    }



    /**
     * crea instancia de tipo de persona
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|unique:tipopersona|regex:/^[A-Za-z0-9\-! ,/@\.\(\)]+$/',
        ];

        $this->validate($request, $rules);

        $tipo = TipoPersona::create($request->all());

        return $this->successResponse($tipo, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un tipo de persona en particular
     */
    public function show($tipo)
    {

        $tipo = TipoPersona::findOrFail($tipo);

        return $this->successResponse($tipo);
    }

    /**
     * actualiza informacion de un tipo de persona
     */
    public function update(Request $request, $tipo)
    {

        $rules = [
            'nombre' => 'required|unique:tipopersona|min:3',
        ];
        $this->validate($request, $rules);
        $tipo  = TipoPersona::findOrFail($tipo);

        $tipo->fill($request->all());
        if ($tipo->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $tipo->save();
        return $this->successResponse($tipo);
    }


    /**
     * remueve un tipo de persona
     */
    public function destroy($tipo)
    {

        $tipo = TipoPersona::findOrFail($tipo);
        $tipo->delete();

        return $this->successResponse($tipo);
    }
}
