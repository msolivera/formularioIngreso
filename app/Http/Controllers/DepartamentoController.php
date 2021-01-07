<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;
use App\Models\Departamento;

class DepartamentoController extends Controller
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
     * retorna lista de departamentos
     */
    public function index()
    {

        $departamento = Departamento::all();

        return $this->successResponse($departamento);
    }



    /**
     * crea instancia de departamento
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|unique:departamento|regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
        ];

        $this->validate($request, $rules);

        $departamento = Departamento::create($request->all());

        return $this->successResponse($departamento, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un departamento en particular
     */
    public function show($departamento)
    {

        $departamento = Departamento::findOrFail($departamento);

        return $this->successResponse($departamento);
    }

    /**
     * actualiza informacion de un departamento
     */
    public function update(Request $request, $departamento)
    {

        $rules = [
            'nombre' => 'required|unique:departamento|min:5',
        ];
        $this->validate($request, $rules);
        $departamento  = Departamento::findOrFail($departamento);

        $departamento->fill($request->all());
        if ($departamento->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $departamento->save();
        return $this->successResponse($departamento);
    }


    /**
     * remueve un departamento
     */
    public function destroy($departamento)
    {

        $departamento = Departamento::findOrFail($departamento);
        $departamento->delete();

        return $this->successResponse($departamento);
    }
    //
}
