<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;
use App\Models\Inscripcion;

class InscripcionController extends Controller
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
     * retorna lista de INSCRIPCIONES
     */
    public function index()
    {

        $inscripcion = Inscripcion::all();

        return $this->successResponse($inscripcion);
    }



    /**
     * crea instancia de inscripcion
     */
    public function store(Request $request)
    {
        $rules = [
            'nombre' => 'required|unique:inscripcion',
        ];

        $this->validate($request, $rules);

        $inscripcion = Inscripcion::create($request->all());

        return $this->successResponse($inscripcion, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de una inscripcion en particular
     */
    public function show($inscripcion)
    {

        $inscripcion = Inscripcion::findOrFail($inscripcion);

        return $this->successResponse($inscripcion);
    }

    /**
     * actualiza informacion de una inscripcion
     */
    public function update(Request $request, $inscripcion)
    {

        $rules = [
            'nombre' => 'required|unique:inscripcion|min:5',
        ];
        $this->validate($request, $rules);
        $inscripcion  = Inscripcion::findOrFail($inscripcion);

        $inscripcion->fill($request->all());
        if ($inscripcion->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $inscripcion->save();
        return $this->successResponse($inscripcion);
    }


    /**
     * remueve una Inscripcion
     */
    public function destroy($inscripcion)
    {

        $inscripcion = Inscripcion::findOrFail($inscripcion);
        $inscripcion->delete();

        return $this->successResponse($inscripcion);
    }
}
