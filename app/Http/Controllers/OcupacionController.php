<?php

namespace App\Http\Controllers;

use App\Models\Ocupacion;
use App\Models\RespuestaPregunta;
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
     * crea instancia de ocupacion y a su vez guarda las preguntas
     */
    public function store(Request $request)
    {
        $rules = [
            'cargo_funcion'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'ente' => 'in:Publico,Privado,Independiente,No trabaja',
            'nombreEmpresa'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'direccion'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'persona_id' => 'required|exists:persona,id',
            //rules para las preguntas
            'respuesta' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'pregunta_id' => 'exists:pregunta,id',
        ];


        $this->validate($request, $rules);
        //CREO OCUPACION Y RESPUESTAS  A MANO
        $ocupacion = new Ocupacion();
        $ocupacion->cargo_funcion = $request->cargo_funcion;
        $ocupacion->ente = $request->ente;
        $ocupacion->nombreEmpresa = $request->nombreEmpresa;
        $ocupacion->direccion = $request->direccion;
        $ocupacion->persona_id = $request->persona_id;

        $ocupacion->save();


        $respuesta1 = new RespuestaPregunta();
        $respuesta1->respuesta = $request->respuesta1;
        $respuesta1->observaciones = $request->observaciones1;
        $respuesta1->pregunta_id = $request->pregunta_id1;
        $respuesta1->persona_id = $request->persona_id;
        $respuesta1->save();

        $respuesta2 = new RespuestaPregunta();
        $respuesta2->respuesta = $request->respuesta2;
        $respuesta2->observaciones = $request->observaciones2;
        $respuesta2->pregunta_id = $request->pregunta_id2;
        $respuesta2->persona_id = $request->persona_id;
        $respuesta2->save();

        $respuesta3 = new RespuestaPregunta();
        $respuesta3->respuesta = $request->respuesta3;
        $respuesta3->observaciones = $request->observaciones3;
        $respuesta3->pregunta_id = $request->pregunta_id3;
        $respuesta3->persona_id = $request->persona_id;
        $respuesta3->save();

        return $this->successResponse($ocupacion->id, Response::HTTP_CREATED);
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
            'cargo_funcion'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'ente' => 'in:Publico,Privado,No trabaja',
            'nombreEmpresa'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'direccion'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'persona_id' => 'required|exists:persona,id',
            //ESTO ES PARA ACTUALIZAR LAS OCUPACIONES
            'respuesta' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'pregunta_id' => 'exists:pregunta,id',
            'observaciones'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',

        ];

        $this->validate($request, $rules);

        $ocupacion = Ocupacion::findOrFail($ocupacion);
        $ocupacion->cargo_funcion = $request->cargo_funcion;
        $ocupacion->ente = $request->ente;
        $ocupacion->nombreEmpresa = $request->nombreEmpresa;
        $ocupacion->direccion = $request->direccion;
        $ocupacion->persona_id = $request->persona_id;

        $ocupacion->update();

        //update de respuestas
        $idRespuesta1 = RespuestaPregunta::where('persona_id', '=', $request->persona_id)
            ->where('pregunta_id', '=', $request->pregunta_id1)->first();

        $idRespuesta_1 = $idRespuesta1->id;

        $respuesta1 = RespuestaPregunta::findOrFail($idRespuesta_1);
        $respuesta1->respuesta = $request->respuesta1;
        $respuesta1->observaciones = $request->observaciones1;
        $respuesta1->pregunta_id = $request->pregunta_id1;
        $respuesta1->persona_id = $request->persona_id;
        $respuesta1->update();

        $idRespuesta2 = RespuestaPregunta::where('persona_id', '=', $request->persona_id)
            ->where('pregunta_id', '=', $request->pregunta_id2)->first();

        $idRespuesta_2 = $idRespuesta2->id;

        $respuesta2 = RespuestaPregunta::findOrFail($idRespuesta_2);
        $respuesta2->respuesta = $request->respuesta2;
        $respuesta2->observaciones = $request->observaciones2;
        $respuesta2->pregunta_id = $request->pregunta_id2;
        $respuesta2->persona_id = $request->persona_id;
        $respuesta2->update();

        $idRespuesta3 = RespuestaPregunta::where('persona_id', '=', $request->persona_id)
            ->where('pregunta_id', '=', $request->pregunta_id3)->first();

        $idRespuesta_3 = $idRespuesta3->id;


        $respuesta3 = RespuestaPregunta::findOrFail($idRespuesta_3);
        $respuesta3->respuesta = $request->respuesta3;
        $respuesta3->observaciones = $request->observaciones3;
        $respuesta3->pregunta_id = $request->pregunta_id3;
        $respuesta3->persona_id = $request->persona_id;
        $respuesta3->update();

        //$ocupacion  = Ocupacion::findOrFail($ocupacion);
        //$ocupacion->fill($request->all());
        //$ocupacion->save();


        return $this->successResponse($ocupacion->id);
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
