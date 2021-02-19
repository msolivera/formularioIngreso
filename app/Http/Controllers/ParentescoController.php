<?php

namespace App\Http\Controllers;

use App\Models\Parentesco;
use App\Models\Persona;
use Illuminate\Http\Request;
use App\Traits\ApiResponses;
use Illuminate\Http\Response;

class ParentescoController extends Controller
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

        $parentesco = Parentesco::all();

        return $this->successResponse($parentesco);
    }



    /**
     * crea instancia de parentesco
     */
    public function store(Request $request)
    {
        $rules = [
            'postulante_id' => 'required|exists:persona,id',
            'familiar_id' => 'required|exists:persona,id',
        ];

        $this->validate($request, $rules);

        $parentesco = Parentesco::create($request->all());

        return $this->successResponse($parentesco, Response::HTTP_CREATED);
    }

    /**
     * mostrar info de un parentesco en particular
     */
    public function show($parentesco)
    {

        $parentesco = Parentesco::findOrFail($parentesco);

        return $this->successResponse($parentesco);
    }

    public function showPariente($persona)
    {
        $persona = Parentesco::join('persona', 'familiar_id', '=', 'persona.id')
            ->join('tipopersona', 'tipo_persona_id', '=', 'tipopersona.id')
            ->select(
                'familiar_id',
                'persona.primerNombre',
                'persona.primerApellido',
                'persona.fechaNacimiento',
                'tipo_persona_id',
                'tipopersona.nombre'
            )->where('postulante_id', $persona)
            ->where('tipo_persona_id', '<>', 2)
            ->where('tipo_persona_id', '<>', 3)
            ->where('tipo_persona_id', '<>', 10)->get();
        return $this->successResponse($persona);


        /**SELECT `familiar_id`,`persona`.`primerNombre`, `persona`.`primerApellido`,`persona`.`fechaNacimiento` ,`tipo_persona_id`,`tipopersona`.`nombre`
FROM parentesco 
INNER JOIN `persona` ON `familiar_id` = `persona`.`id`
INNER JOIN `tipopersona` on `tipo_persona_id` = `tipopersona`.`id`
where `postulante_id`= 26 AND `tipo_persona_id` <> 2 and `tipo_persona_id` <> 3  and `tipo_persona_id` <> 10 */
    }

    /**
     * actualiza informacion de un parentesco
     */
    public function update(Request $request, $parentesco)
    {

        $rules = [];
        $this->validate($request, $rules);
        $parentesco  = Parentesco::findOrFail($parentesco);

        $parentesco->fill($request->all());
        if ($parentesco->isClean()) {

            return $this->errorResponse('Al menos debe cambiar un valor', Response::HTTP_UNPROCESSABLE_ENTITY);
        }
        $parentesco->save();
        return $this->successResponse($parentesco);
    }


    /**
     * remueve un parentesco
     */
    public function destroy($parentesco)
    {

        $parentesco = Parentesco::findOrFail($parentesco);
        $parentesco->delete();

        return $this->successResponse($parentesco);
    }
}
