<?php

namespace App\Http\Controllers;

use App\Models\RespuestaPregunta;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class RespuestaController extends Controller
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

        $respuesta = RespuestaPregunta::all();

        return $this->successResponse($respuesta);
    }



    /**
     * crea instancia de respuesta
     */
    public function store(Request $request)
    {
        $rules = [
            'respuesta' => 'required',
            'persona_id' => 'exists:persona,id',
            'pregunta_id' => 'exists:pregunta,id',
        ];

        $this->validate($request, $rules);

        $respuesta = RespuestaPregunta::create($request->all());

        return $this->successResponse($respuesta, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un respuesta en particular
     */
    public function show($respuesta)
    {

        $respuesta = RespuestaPregunta::findOrFail($respuesta);

        return $this->successResponse($respuesta);
    }

    /**
     * actualiza informacion de un respuesta
     */
    public function update(Request $request, $respuesta)
    {

        $rules = [
            'respuesta' => 'required|in:SI,NO',
            'observaciones' => 'regex:/^[A-Za-z0-9\-! ,/@\.\(\)]+$/|min:4',
            'persona_id' => 'required|exists:persona,id',
            'pregunta_id' => 'required|exists:pregunta,id',
        ];
        $this->validate($request, $rules);
        $respuesta  = RespuestaPregunta::findOrFail($respuesta);

        $respuesta->fill($request->all());
        if ($respuesta->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $respuesta->save();
        return $this->successResponse($respuesta);
    }


    /**
     * remueve un respuesta
     */
    public function destroy($respuesta)
    {

        $respuesta = RespuestaPregunta::findOrFail($respuesta);
        $respuesta->delete();

        return $this->successResponse($respuesta);
    }
}
