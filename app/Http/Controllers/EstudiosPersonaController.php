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



    /**
     * crea instancia de estudios
     */
    public function store(Request $request)
    {
        $rules = [
            'anioEstudio'  => 'regex:/^[A-Za-z0-9\-! ,ñ@\.\(\)]+$/|min:4',
            'nombreInstituto'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'tipo_estudio_id' => 'required|exists:tipoEstudio,id',
            'persona_id' => 'required|exists:persona,id',
        ];

        $this->validate($request, $rules);

        $estudios = EstudioPersona::create($request->all());

        return $this->successResponse($estudios, Response::HTTP_CREATED);
    }


    public function storeBasicos(Request $request)
    {
        $rules = [
            '"anioEstudio'  => 'regex:/^[A-Za-z0-9\-! ,ñ@\.\(\)]+$/|min:4',
            'nombreInstituto'  => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'tipo_estudio_id' => 'required|exists:tipoEstudio,id',
            'persona_id' => 'required|exists:persona,id',


        ];

        //'primeroPrimaria_nombreInstituto:',
        //' segundoPrimaria_nombreInstituto: ""',
        //'terceroPrimaria_nombreInstituto: ""',
        //cuartoPrimaria_nombreInstituto
        //quintoPrimaria_nombreInstituto
        //sextoPrimaria_nombreInstituto
        //primeroSecu_nombreInstituto
        //segundoSecu_nombreInstituto
        //terceroSecu_nombreInstituto
        //cuartoBach_nombreInstituto
        //quintoBach_nombreInstituto
        //sextoBach_nombreInstituto

        $this->validate($request, $rules);

        /**
         * $persona = new Persona;
         *$persona->primerNombre = $request->primerNombre;
         *$persona->save();
         *return $this->successResponse($persona, Response::HTTP_CREATED);
         */
    }

    /** HACER EL ESTUDIO PARTICULAR ACA */

    /**
     * mostrar info de un estudios en particular
     */
    public function show($estudios)
    {

        $estudios = EstudioPersona::findOrFail($estudios);

        return $this->successResponse($estudios);
    }

    /**
     * actualiza informacion de un estudios
     */
    public function update(Request $request, $estudios)
    {

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
    public function destroy($estudios)
    {

        $estudios = EstudioPersona::findOrFail($estudios);
        $estudios->delete();

        return $this->successResponse($estudios);
    }
}
