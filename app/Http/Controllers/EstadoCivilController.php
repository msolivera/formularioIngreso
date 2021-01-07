<?php

namespace App\Http\Controllers;

use App\Models\EstadoCivil;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class EstadoCivilController extends Controller
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
     * retorna lista de estados civiles
     */
    public function index()
    {

        $estadoCivil = EstadoCivil::all();

        return $this->successResponse($estadoCivil);
    }



    /**
     * crea instancia de estadoCivil
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|unique:estadocivil|regex:/^[a-zA-Z]+$/|min:4',
        ];

        $this->validate($request, $rules);

        $estadoCivil = EstadoCivil::create($request->all());

        return $this->successResponse($estadoCivil, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un estadoCivil en particular
     */
    public function show($estadoCivil)
    {

        $estadoCivil = EstadoCivil::findOrFail($estadoCivil);

        return $this->successResponse($estadoCivil);
    }

    /**
     * actualiza informacion de un estadoCivil
     */
    public function update(Request $request, $estadoCivil)
    {

        $rules = [
            'nombre' => 'required|unique:estadocivil|min:5',
        ];
        $this->validate($request, $rules);
        $estadoCivil  = EstadoCivil::findOrFail($estadoCivil);

        $estadoCivil->fill($request->all());
        if ($estadoCivil->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $estadoCivil->save();
        return $this->successResponse($estadoCivil);
    }


    /**
     * remueve un estadoCivil
     */
    public function destroy($estadoCivil)
    {

        $estadoCivil = EstadoCivil::findOrFail($estadoCivil);
        $estadoCivil->delete();

        return $this->successResponse($estadoCivil);
    }
}
