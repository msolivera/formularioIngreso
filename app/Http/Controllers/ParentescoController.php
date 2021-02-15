<?php

namespace App\Http\Controllers;

use App\Models\Parentesco;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class ParentescoController extends Controller
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
     * retorna lista de preguntas
     */
    public function index()
    {

        $parentesco = Parentesco::all();

        return $this->successResponse($parentesco);
    }



    /**
     * crea instancia de parentesco
     */
    public function store(Request $request)
    {
        $rules = [
            'postulante_id' => 'required|exists:persona,id',
            'familiar_id' => 'required|exists:persona,id',
        ];

        $this->validate($request, $rules);

        $parentesco = Parentesco::create($request->all());

        return $this->successResponse($parentesco, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un parentesco en particular
     */
    public function show($parentesco)
    {

        $parentesco = Parentesco::findOrFail($parentesco);

        return $this->successResponse($parentesco);
    }

    /**
     * actualiza informacion de un parentesco
     */
    public function update(Request $request, $parentesco)
    {

        $rules = [];
        $this->validate($request, $rules);
        $parentesco  = Parentesco::findOrFail($parentesco);

        $parentesco->fill($request->all());
        if ($parentesco->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $parentesco->save();
        return $this->successResponse($parentesco);
    }


    /**
     * remueve un parentesco
     */
    public function destroy($parentesco)
    {

        $parentesco = Parentesco::findOrFail($parentesco);
        $parentesco->delete();

        return $this->successResponse($parentesco);
    }
}
