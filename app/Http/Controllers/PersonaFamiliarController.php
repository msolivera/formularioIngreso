<?php

namespace App\Http\Controllers;

use App\Models\Persona;
use App\Models\DireccionExtranjero;
use App\Rules\ValidCI;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class PersonaFamiliarController extends Controller
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


        $rules = [
            'primerNombre' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'segundoNombre' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'primerApellido' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'segundoApellido' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'apodo' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'fallecido' => 'regex:/^[a-zA-Z]+$/|in:SI,NO',
            'cedula' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'credencialSerie' => 'regex:/^[a-zA-Z]+$/',
            'credencialNumero' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'domicilioActual' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'domicilioAnterior' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'telefono_celular' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'correoElectronico' => 'email',
            'seccionalPolicial' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            //Esto es para hacer el insert en la talba de direccion si es extranjero
            'nombre_ciudad' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'nombre_departamento_estado' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',

        ];

        $this->validate($request, $rules);
        //CREO PERSONA Y DIRECCION DE EXTRANJERO A MANO
        $persona = new Persona;
        $persona->primerNombre = $request->primerNombre;
        $persona->segundoNombre = $request->segundoNombre;
        $persona->primerApellido = $request->primerApellido;
        $persona->segundoApellido = $request->segundoApellido;
        $persona->apodo = $request->apodo;
        $persona->fallecido = $request->fallecido;
        $persona->fechaNacimiento = $request->fechaNacimiento;
        $persona->fechaDefuncion = $request->fechaDefuncion;
        $persona->cedula = $request->cedula;
        $persona->credencialSerie = $request->credencialSerie;
        $persona->credencialNumero = $request->credencialNumero;
        $persona->sexo = $request->sexo;
        $persona->identidadGenero = $request->identidadGenero;
        $persona->raza = $request->raza;
        $persona->domicilioActual = $request->domicilioActual;
        $persona->domicilioAnterior = $request->domicilioAnterior;
        $persona->telefono_celular = $request->telefono_celular;
        $persona->correoElectronico = $request->correoElectronico;
        $persona->seccionalPolicial = $request->seccionalPolicial;
        $persona->estadocivil_id = $request->estadocivil_id;
        $persona->pais_id = $request->pais_id;
        $persona->tipo_persona_id = $request->tipo_persona_id;
        $persona->inscripcion_id = $request->inscripcion_id;
        $persona->departamento_id = $request->departamento_id;
        $persona->ciudadBarrio_id = $request->ciudadBarrio_id;
        $persona->save();


        $direccionExtranjero = new DireccionExtranjero;
        $direccionExtranjero->nombre_ciudad = $request->nombre_ciudad;
        $direccionExtranjero->nombre_departamento_estado = $request->nombre_departamento_estado;
        $direccionExtranjero->pais_id = $request->pais_id;
        $direccionExtranjero->persona_id = $persona->id;

        $direccionExtranjero->save();


        ///ASI ESTABA ANTES SIN EL CREADO A MANO:
        /* $persona = Persona::create($request->all());*/


        return $this->successResponse($persona->id, Response::HTTP_CREATED);
    }


    public function storeOtrosFliares(Request $request)
    {

        $rules = [
            'primerNombre' => 'required|regex:/^[a-zA-Z]+$/|min:4',
            'primerApellido' => 'required|regex:/^[a-zA-Z]+$/|min:4',
            'tipo_persona_id' => 'required|exists:tipopersona,id',
            'cedula' => 'required|regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
        ];
        $this->validate($request, $rules);

        $familiar = new Persona();

        $familiar->primerNombre = $request->primerNombre;
        $familiar->primerApellido = $request->primerApellido;
        $familiar->fechaNacimiento = $request->fechaNacimiento;
        $familiar->cedula = $request->cedula;
        $familiar->tipo_persona_id = $request->tipo_persona_id;
        $familiar->save();

        return $this->successResponse($familiar->id, Response::HTTP_CREATED);
    }

    public function updateOtroFliar(Request $request, $persona)
    {

        $rules = [
            'primerNombre' => 'required|regex:/^[a-zA-Z]+$/|min:4',
            'primerApellido' => 'required|regex:/^[a-zA-Z]+$/|min:4',
            'tipo_persona_id' => 'required|exists:tipopersona,id',
            'cedula' => 'required|regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
        ];

        $this->validate($request, $rules);
        $persona  = Persona::findOrFail($persona);


        $persona->fill($request->all());
        if ($persona->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $persona->save();
        return $this->successResponse($persona->id);
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
            'primerNombre' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'segundoNombre' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'primerApellido' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'segundoApellido' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'apodo' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'cedula' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'credencialSerie' => 'regex:/^[a-zA-Z]+$/',
            'credencialNumero' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'domicilioActual' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'domicilioAnterior' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'telefono_celular' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'correoElectronico' => 'email',
            'seccionalPolicial' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            //Esto es para hacer el insert en la talba de direccion si es extranjero
            'nombre_ciudad' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',
            'nombre_departamento_estado' => 'regex:/^[A-Za-z0-9\-! ,@\.\(\)]+$/',

        ];
        $this->validate($request, $rules);
        $persona  = Persona::findOrFail($persona);


        $persona->fill($request->all());
        if ($persona->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $persona->save();
        return $this->successResponse($persona->id);
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
