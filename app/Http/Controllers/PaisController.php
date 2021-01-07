<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;
use App\Models\Pais;

class PaisController extends Controller
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

        $pais = Pais::all();

        return $this->successResponse($pais);
    }



    /**
     * crea instancia de pais
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|unique:pais',
        ];

        $this->validate($request, $rules);

        $pais = Pais::create($request->all());

        return $this->successResponse($pais, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un pais en particular
     */
    public function show($pais)
    {

        $pais = Pais::findOrFail($pais);

        return $this->successResponse($pais);
    }

    /**
     * actualiza informacion de un pais
     */
    public function update(Request $request, $pais)
    {

        $rules = [
            'nombre' => 'required|unique:pais|min:5|regex:/^[A-Za-z0-9\-! ,/@\.\(\)]+$/',
        ];
        $this->validate($request, $rules);
        $pais  = Pais::findOrFail($pais);

        $pais->fill($request->all());
        if ($pais->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $pais->save();
        return $this->successResponse($pais);
    }


    /**
     * remueve un pais
     */
    public function destroy($pais)
    {

        $pais = Pais::findOrFail($pais);
        $pais->delete();

        return $this->successResponse($pais);
    }
}
