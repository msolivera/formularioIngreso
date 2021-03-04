<?php

namespace App\Http\Controllers;

use App\Models\EstudioPersona;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;


class EstudiosPersonaController extends Controller
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
     * retorna lista de los estudios de la persona
     */
    public function index()
    {

        $estudios = EstudioPersona::all();

        return $this->successResponse($estudios);
    }

    public function indexOtroEstudioPorPersona($idPersona)
    {
        $estudios = EstudioPersona::where('persona_id', $idPersona)->where('tipo_estudio_id', 4)->get();

        return $this->successResponse($estudios);
    }


    /**
     * crea instancia de estudios
     */
    public function store(Request $request)
    {
        $rules = [
            'anioEstudio'  => 'regex:/^[A-Za-z0-9\-! ,ñ@\.\(\)]+$/',
            'nombreInstituto'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'tipo_estudio_id' => 'required|exists:tipoEstudio,id',

        ];

        $this->validate($request, $rules);

        $estudios = new EstudioPersona();

        $estudios->anioEstudio = $request->anioEstudio;
        $estudios->nombreInstituto = $request->nombreInstituto;
        $estudios->tipo_estudio_id = $request->tipo_estudio_id;
        $estudios->persona_id = $request->persona_id;
        $estudios->save();

        return $this->successResponse($estudios, Response::HTTP_CREATED);
    }

    public function storeEstudiosBasicos(Request $request)
    {
        //aca habria que controlar unique idPersona con tipoEstudio y nombreEstudio

        $estudios = EstudioPersona::where('persona_id', '=', $request->primeroPrimaria_persona_id)
            ->where('anioEstudio', '=', 'Primer año')
            ->where('tipo_estudio_id', '=', '1')->first();

        if ($estudios) {
            $estudios->nombreInstituto = $request->primeroPrimaria_nombreInstituto;
            $estudios->update();
        } else {
            $primeroPrimaria = new EstudioPersona();
            $primeroPrimaria->anioEstudio = $request->primeroPrimaria_anioEstudio;
            $primeroPrimaria->nombreInstituto = $request->primeroPrimaria_nombreInstituto;
            $primeroPrimaria->tipo_estudio_id = $request->primeroPrimaria_tipo_estudio_id;
            $primeroPrimaria->persona_id = $request->primeroPrimaria_persona_id;
            $primeroPrimaria->save();
        }


        $estudiossegundoPrimaria = EstudioPersona::where('persona_id', '=', $request->primeroPrimaria_persona_id)
            ->where('anioEstudio', '=', 'Segundo año')
            ->where('tipo_estudio_id', '=', '1')->first();

        if ($estudiossegundoPrimaria) {
            $estudiossegundoPrimaria->nombreInstituto = $request->segundoPrimaria_nombreInstituto;
            $estudiossegundoPrimaria->update();
        } else {
            $segundoPrimaria = new EstudioPersona();

            $segundoPrimaria->anioEstudio = $request->segundoPrimaria_anioEstudio;
            $segundoPrimaria->nombreInstituto = $request->segundoPrimaria_nombreInstituto;
            $segundoPrimaria->tipo_estudio_id = $request->segundoPrimaria_tipo_estudio_id;
            $segundoPrimaria->persona_id = $request->segundoPrimaria_persona_id;
            $segundoPrimaria->save();
        }


        $terceroPrimaria = new EstudioPersona();

        $terceroPrimaria->anioEstudio = $request->terceroPrimaria_anioEstudio;
        $terceroPrimaria->nombreInstituto = $request->terceroPrimaria_nombreInstituto;
        $terceroPrimaria->tipo_estudio_id = $request->terceroPrimaria_tipo_estudio_id;
        $terceroPrimaria->persona_id = $request->terceroPrimaria_persona_id;
        $terceroPrimaria->save();


        $cuartoPrimaria = new EstudioPersona();

        $cuartoPrimaria->anioEstudio = $request->cuartoPrimaria_anioEstudio;
        $cuartoPrimaria->nombreInstituto = $request->cuartoPrimaria_nombreInstituto;
        $cuartoPrimaria->tipo_estudio_id = $request->cuartoPrimaria_tipo_estudio_id;
        $cuartoPrimaria->persona_id = $request->cuartoPrimaria_persona_id;
        $cuartoPrimaria->save();

        $quintoPrimaria = new EstudioPersona();

        $quintoPrimaria->anioEstudio = $request->quintoPrimaria_anioEstudio;
        $quintoPrimaria->nombreInstituto = $request->quintoPrimaria_nombreInstituto;
        $quintoPrimaria->tipo_estudio_id = $request->quintoPrimaria_tipo_estudio_id;
        $quintoPrimaria->persona_id = $request->quintoPrimaria_persona_id;
        $quintoPrimaria->save();

        $sextoPrimaria = new EstudioPersona();

        $sextoPrimaria->anioEstudio = $request->sextoPrimaria_anioEstudio;
        $sextoPrimaria->nombreInstituto = $request->sextoPrimaria_nombreInstituto;
        $sextoPrimaria->tipo_estudio_id = $request->sextoPrimaria_tipo_estudio_id;
        $sextoPrimaria->persona_id = $request->sextoPrimaria_persona_id;
        $sextoPrimaria->save();

        $primeroSecu = new EstudioPersona();

        $primeroSecu->anioEstudio = $request->primeroSecu_anioEstudio;
        $primeroSecu->nombreInstituto = $request->primeroSecu_nombreInstituto;
        $primeroSecu->tipo_estudio_id = $request->primeroSecu_tipo_estudio_id;
        $primeroSecu->persona_id = $request->primeroSecu_persona_id;
        $primeroSecu->save();

        $segundoSecu = new EstudioPersona();

        $segundoSecu->anioEstudio = $request->segundoSecu_anioEstudio;
        $segundoSecu->nombreInstituto = $request->segundoSecu_nombreInstituto;
        $segundoSecu->tipo_estudio_id = $request->segundoSecu_tipo_estudio_id;
        $segundoSecu->persona_id = $request->segundoSecu_persona_id;
        $segundoSecu->save();

        $terceroSecu = new EstudioPersona();

        $terceroSecu->anioEstudio = $request->terceroSecu_anioEstudio;
        $terceroSecu->nombreInstituto = $request->terceroSecu_nombreInstituto;
        $terceroSecu->tipo_estudio_id = $request->terceroSecu_tipo_estudio_id;
        $terceroSecu->persona_id = $request->terceroSecu_persona_id;
        $terceroSecu->save();

        $cuartoBach = new EstudioPersona();

        $cuartoBach->anioEstudio = $request->cuartoBach_anioEstudio;
        $cuartoBach->nombreInstituto = $request->cuartoBach_nombreInstituto;
        $cuartoBach->tipo_estudio_id = $request->cuartoBach_tipo_estudio_id;
        $cuartoBach->persona_id = $request->cuartoBach_persona_id;
        $cuartoBach->save();

        $quintoBach = new EstudioPersona();

        $quintoBach->anioEstudio = $request->quintoBach_anioEstudio;
        $quintoBach->nombreInstituto = $request->quintoBach_nombreInstituto;
        $quintoBach->tipo_estudio_id = $request->quintoBach_tipo_estudio_id;
        $quintoBach->persona_id = $request->quintoBach_persona_id;
        $quintoBach->save();


        $sextoBach = new EstudioPersona();

        $sextoBach->anioEstudio = $request->sextoBach_anioEstudio;
        $sextoBach->nombreInstituto = $request->sextoBach_nombreInstituto;
        $sextoBach->tipo_estudio_id = $request->sextoBach_tipo_estudio_id;
        $sextoBach->persona_id = $request->sextoBach_persona_id;
        $sextoBach->save();



        return $this->successResponse('ok polilla', Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un estudios en particular
     */
    public function show($estudios) //tengo que hacer un show segun un id de persona
    {

        $estudios = EstudioPersona::findOrFail($estudios);

        return $this->successResponse($estudios);
    }



    /**
     * actualiza informacion de un estudios
     */
    public function update(Request $request, $estudios)
    {
        //tenemos id persona | tipo estudio | nombre
        $rules = [
            'nombre' => 'required',
        ];
        $this->validate($request, $rules);
        $estudios  = EstudioPersona::findOrFail($estudios);

        $estudios->fill($request->all());
        if ($estudios->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $estudios->save();
        return $this->successResponse($estudios);
    }


    /**
     * remueve un estudios
     */
    public function eliminar($nombre, $persona)
    {
        dd($persona);
        $estudios = EstudioPersona::where('persona_id' == $persona)
            ->where('anioEstudio' == $nombre)->first();
        $estudios->delete();

        return true;
    }
}
