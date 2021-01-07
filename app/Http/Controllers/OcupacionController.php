<?php

namespace App\Http\Controllers;

use App\Models\Ocupacion;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class OcupacionController extends Controller
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
     * retorna lista de ocupaciones
     */
    public function index()
    {

        $ocupacion = Ocupacion::all();

        return $this->successResponse($ocupacion);
    }



    /**
     * crea instancia de ocupacion
     */
    public function store(Request $request)
    {
        $rules = [
            'cargo_funcion'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'ente' => 'in:Publico,Privado',
            'nombreEmpresa'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'direccion'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'persona_id' => 'required|exists:persona,id',
        ];

        $this->validate($request, $rules);

        $ocupacion = Ocupacion::create($request->all());

        return $this->successResponse($ocupacion, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un ocupacion en particular
     */
    public function show($ocupacion)
    {

        $ocupacion = Ocupacion::findOrFail($ocupacion);

        return $this->successResponse($ocupacion);
    }

    /**
     * actualiza informacion de un ocupacion
     */
    public function update(Request $request, $ocupacion)
    {

        $rules = [
            'nombre' => 'required|unique:ocupacion|min:5',
        ];
        $this->validate($request, $rules);
        $ocupacion  = Ocupacion::findOrFail($ocupacion);

        $ocupacion->fill($request->all());
        if ($ocupacion->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $ocupacion->save();
        return $this->successResponse($ocupacion);
    }


    /**
     * remueve un ocupacion
     */
    public function destroy($ocupacion)
    {

        $ocupacion = Ocupacion::findOrFail($ocupacion);
        $ocupacion->delete();

        return $this->successResponse($ocupacion);
    }
}
