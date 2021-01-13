<?php

namespace App\Http\Controllers;

use App\Models\DireccionExtranjero;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class DireccionExtranjeroController extends Controller
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
     * retorna lista de direcciones
     */
    public function index()
    {

        $direccion = DireccionExtranjero::all();

        return $this->successResponse($direccion);
    }



    /**
     * crea instancia de direccion
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre_ciudad' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'nombre_departamento_estado' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'pais_id' => 'required|exists:pais,id',
            'persona_id' => 'required|exists:persona,id'

        ];

        $this->validate($request, $rules);

        $direccion = DireccionExtranjero::create($request->all());

        return $this->successResponse($direccion, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un direccion en particular
     */
    public function show($direccion)
    {

        $direccion = DireccionExtranjero::findOrFail($direccion);

        return $this->successResponse($direccion);
    }

    /**
     * actualiza informacion de un direccion
     */
    public function update(Request $request, $direccion)
    {

        $rules = [
            'nombre' => 'required|min:5',
        ];
        $this->validate($request, $rules);
        $direccion  = DireccionExtranjero::findOrFail($direccion);

        $direccion->fill($request->all());
        if ($direccion->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $direccion->save();
        return $this->successResponse($direccion);
    }


    /**
     * remueve un direccion
     */
    public function destroy($direccion)
    {

        $direccion = DireccionExtranjero::findOrFail($direccion);
        $direccion->delete();

        return $this->successResponse($direccion);
    }
}
