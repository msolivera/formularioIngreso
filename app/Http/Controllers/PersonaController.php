<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Rules\ValidCI;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class PersonaController extends Controller
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
     * retorna lista de persona
     */
    public function index()
    {

        $persona = Persona::all();

        return $this->successResponse($persona);
    }



    /**
     * crea instancia de persona
     */
    public function store(Request $request)
    {

        //controlar el tipo de rules segun la persona tipo
        $rules = [
            'primerNombre' => 'required|regex:/^[a-zA-Z]+$/|min:4',
            'segundoNombre' => 'regex:/^[a-zA-Z]+$/|min:4',
            'primerApellido' => 'required|regex:/^[a-zA-Z]+$/|min:4',
            'segundoApellido' => 'required|regex:/^[a-zA-Z]+$/|min:4',
            'apodo' => 'regex:/^[a-zA-Z]+$/|min:4',
            'fechaNacimiento' => 'required|date',
            'cedula' => [
                'integer',
                'required',
                new ValidCI,
            ],
            'credencialSerie' => 'regex:/^[a-zA-Z]+$/|min:3',
            'credencialNumero' => 'integer|min:0|max:1000000',
            'sexo' => 'in:Femenino,Masculino',
            'domicilioActual' => 'required|regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'domicilioAnterior' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/|min:4',
            'telefono_celular' => 'numeric',
            'correoElectronico' => 'email',
            'seccionalPolicial' => 'integer',
            'estadocivil_id' => 'required|exists:estadocivil,id', //me fijo que el dato exista en la otra tabla de la base
            'pais_id' => 'required',
            'tipopersona_id' => 'required|exists:tipopersona,id',
            'inscripcion_id' => 'required|exists:inscripcion,id',
            'departamento_id' => 'required|exists:departamento,id',
            'ciudadBarrio_id' => 'required|exists:ciudad_barrio,id',


        ];


        $this->validate($request, $rules);

        $persona = Persona::create($request->all());

        return $this->successResponse($persona, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un persona en particular
     */
    public function show($persona)
    {

        $persona = Persona::findOrFail($persona);

        return $this->successResponse($persona);
    }

    /**
     * actualiza informacion de un persona
     */
    public function update(Request $request, $persona)
    {

        $rules = [
            'primerNombre' => 'required',
            'primerApellido' => 'required',
            'segundoApellido' => 'required',
            'fechaNacimiento' => 'required',
            'cedula' => 'required',
            'sexo' => 'required',
            'domicilioActual' => 'required',
            'telefono_celular' => 'required',
            'estadoCivil_id' => 'required',
            'pais_id' => 'required',
        ];
        $this->validate($request, $rules);
        $persona  = Persona::findOrFail($persona);

        $persona->fill($request->all());
        if ($persona->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $persona->save();
        return $this->successResponse($persona);
    }


    /**
     * remueve un persona
     */
    public function destroy($persona)
    {

        $persona = Persona::findOrFail($persona);
        $persona->delete();

        return $this->successResponse($persona);
    }
}
