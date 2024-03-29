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
            'respuesta' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
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
            'respuesta' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'persona_id' => 'exists:persona,id',
            'pregunta_id' => 'exists:pregunta,id',
        ];

        $this->validate($request, $rules);
        $respuesta  = RespuestaPregunta::findOrFail($respuesta);

        $respuesta->fill($request->all());
        /* if ($respuesta->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }*/
        $respuesta->save();
        return $this->successResponse($respuesta->id);
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


    public function showRespuestas($persona)
    {
        $persona = RespuestaPregunta::join('pregunta', 'pregunta_id', '=', 'pregunta.id')

            ->select(
                'pregunta_id',
                'respuestapregunta.id',
                'pregunta.textoPregunta',
                'respuesta',
            )->where('persona_id', $persona)->get();
        return $this->successResponse($persona);
        /*SELECT `pregunta`.`textoPregunta`, `respuestapregunta`.`respuesta`  FROM respuestapregunta INNER JOIN `pregunta` 
        ON `pregunta_id` = `pregunta`.`id`
WHERE `persona_id`=37*/
    }
}
