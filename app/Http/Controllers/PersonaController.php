<?php

namespace App\Http\Controllers;
use App\Models\Persona;
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
