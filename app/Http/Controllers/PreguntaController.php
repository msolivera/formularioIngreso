<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class PreguntaController extends Controller
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

        $pregunta = Pregunta::all();

        return $this->successResponse($pregunta);
    }



    /**
     * crea instancia de pregunta
     */
    public function store(Request $request)
    {
        $rules = [
            'textoPregunta' => 'required|regex:/^[A-Za-z0-9\-! ,/@\.\(\)]+$/|min:4',
            'tipopersona_id' => 'required|exists:tipopersona,id',
        ];

        $this->validate($request, $rules);

        $pregunta = Pregunta::create($request->all());

        return $this->successResponse($pregunta, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un pregunta en particular
     */
    public function show($pregunta)
    {

        $pregunta = Pregunta::findOrFail($pregunta);

        return $this->successResponse($pregunta);
    }

    /**
     * actualiza informacion de un pregunta
     */
    public function update(Request $request, $pregunta)
    {

        $rules = [
            'nombre' => 'required|min:5',
        ];
        $this->validate($request, $rules);
        $pregunta  = Pregunta::findOrFail($pregunta);

        $pregunta->fill($request->all());
        if ($pregunta->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $pregunta->save();
        return $this->successResponse($pregunta);
    }


    /**
     * remueve un pregunta
     */
    public function destroy($pregunta)
    {

        $pregunta = Pregunta::findOrFail($pregunta);
        $pregunta->delete();

        return $this->successResponse($pregunta);
    }
}
