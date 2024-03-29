<?php

namespace App\Traits;

use Illuminate\Http\Response;

trait ApiResponses
{
    /**
     * Construye una respuesta de éxito
     * @param string|array $data
     * @param int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function successResponse($data, $code = Response::HTTP_OK){
        return response()->json(['data' =>$data], $code);
    }

    /**
     * Construye una respuesta de error
     * @param string $mensaje
     * @param int $code
     * @return Illuminate\Http\JsonResponse
     */
    public function errorResponse($mensaje, $code){
        return response()->json(['error' => $mensaje, 'code'=>$code], $code);
    }
}