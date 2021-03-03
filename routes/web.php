<?php

use App\Models\CiudadBarrio;
use Illuminate\Support\Str;

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

//$router->get('/keyGenerate', function () {
//    return Str::random(32);
//});

//$router->group(['middleware' => 'client.credentials'], function () use ($router) {
/**
 * Rutas de Inscripcion
 */
$router->get('/inscripciones', 'InscripcionController@index');
$router->post('/inscripcion', 'InscripcionController@store');
$router->get('/inscripcion/{inscripcion}', 'InscripcionController@show');
$router->put('/inscripcion/{inscripcion}', 'InscripcionController@update');
$router->patch('/inscripcion/{inscripcion}', 'InscripcionController@update');
$router->delete('/inscripcion/{inscripcion}', 'InscripcionController@destroy');

/**
 * Rutas de Tipo de persona
 */
$router->get('/tiposPersonas', 'TipoPersonaController@index');
$router->post('/tiposPersona', 'TipoPersonaController@store');
$router->get('/tiposPersona/{tipospersona}', 'TipoPersonaController@show');
$router->put('/tiposPersona/{tipospersona}', 'TipoPersonaController@update');
$router->patch('/tiposPersona/{tipospersona}', 'TipoPersonaController@update');
$router->delete('/tiposPersona/{tipospersona}', 'TipoPersonaController@destroy');

/**
 * Rutas de Pais
 */
$router->get('/paises', 'PaisController@index');
$router->post('/pais', 'PaisController@store');
$router->get('/pais/{pais}', 'PaisController@show');
$router->put('/pais/{pais}', 'PaisController@update');
$router->patch('/pais/{pais}', 'PaisController@update');
$router->delete('/pais/{pais}', 'PaisController@destroy');

/**
 * Rutas de departamentos
 */
$router->get('/departamentos', 'DepartamentoController@index');
$router->post('/departamento', 'DepartamentoController@store');
$router->get('/departamento/{departamento}', 'DepartamentoController@show');
$router->put('/departamento/{departamento}', 'DepartamentoController@update');
$router->patch('/departamento/{departamento}', 'DepartamentoController@update');
$router->delete('/departamento/{departamento}', 'DepartamentoController@destroy');

/**
 * Rutas de ocupaciones
 */
$router->get('/ocupaciones', 'OcupacionController@index');
$router->post('/ocupacion', 'OcupacionController@store');
$router->get('/ocupacion/{ocupacion}', 'OcupacionController@show');
$router->put('/ocupacion/{ocupacion}', 'OcupacionController@update');
$router->patch('/ocupacion/{ocupacion}', 'OcupacionController@update');
$router->delete('/ocupacion/{ocupacion}', 'OcupacionController@destroy');

/**
 * Rutas de estadoCivil
 */
$router->get('/estadosCiviles', 'EstadoCivilController@index');
$router->post('/estadoCivil', 'EstadoCivilController@store');
$router->get('/estadoCivil/{estadoCivil}', 'EstadoCivilController@show');
$router->put('/estadoCivil/{estadoCivil}', 'EstadoCivilController@update');
$router->patch('/estadoCivil/{estadoCivil}', 'EstadoCivilController@update');
$router->delete('/estadoCivil/{estadoCivil}', 'EstadoCivilController@destroy');

/**
 * Rutas de tipoEstudio
 */
$router->get('/tipoEstudios', 'TipoEstudioController@index');
$router->post('/tipoEstudio', 'TipoEstudioController@store');
$router->get('/tipoEstudio/{tipoEstudio}', 'TipoEstudioController@show');
$router->put('/tipoEstudio/{tipoEstudio}', 'TipoEstudioController@update');
$router->patch('/tipoEstudio/{tipoEstudio}', 'TipoEstudioController@update');
$router->delete('/tipoEstudio/{tipoEstudio}', 'TipoEstudioController@destroy');

/**
 * Rutas de direccion extranjeros
 */
$router->get('/direcciones', 'DireccionExtranjeroController@index');
$router->post('/direccion', 'DireccionExtranjeroController@store');
$router->get('/direccion/{direccion}', 'DireccionExtranjeroController@show');
$router->put('/direccion/{direccion}', 'DireccionExtranjeroController@update');
$router->patch('/direccion/{direccion}', 'DireccionExtranjeroController@update');
$router->delete('/direccion/{direccion}', 'DireccionExtranjeroController@destroy');

/**
 * Rutas de  ciudad barrio
 */
$router->get('/ciudades', 'CiudadBarrioController@index');
$router->get('/cuidadPorDepa/{idDepa}', 'CiudadBarrioController@indexPorDepartamento');
$router->post('/ciudad', 'CiudadBarrioController@store');
$router->get('/ciudad/{ciudad}', 'CiudadBarrioController@show');
$router->put('/ciudad/{ciudad}', 'CiudadBarrioController@update');
$router->patch('/ciudad/{ciudad}', 'CiudadBarrioController@update');
$router->delete('/ciudad/{ciudad}', 'CiudadBarrioController@destroy');

/**
 * Rutas de  Estudios Persona
 */
$router->get('/estudios', 'EstudiosPersonaController@index');
$router->get('/estudios/{idPersona}', 'EstudiosPersonaController@indexOtroEstudioPorPersona');
$router->post('/estudio', 'EstudiosPersonaController@store');
$router->post('/estudiosBasicos', 'EstudiosPersonaController@storeEstudiosBasicos');
$router->get('/estudio/{estudio}', 'EstudiosPersonaController@show');
$router->put('/estudio/{estudio}', 'EstudiosPersonaController@update');
$router->patch('/estudio/{estudio}', 'EstudiosPersonaController@update');
$router->delete('/estudio/{estudio}', 'EstudiosPersonaController@destroy');

/**
 * Rutas de  Preguntas
 */
$router->get('/preguntas', 'PreguntaController@index');
$router->post('/pregunta', 'PreguntaController@store');
$router->get('/pregunta/{pregunta}', 'PreguntaController@show');
$router->put('/pregunta/{pregunta}', 'PreguntaController@update');
$router->patch('/pregunta/{pregunta}', 'PreguntaController@update');
$router->delete('/pregunta/{pregunta}', 'PreguntaController@destroy');

/**
 * Rutas de  Respuestas
 */
$router->get('/respuestas', 'RespuestaController@index');
$router->post('/respuesta', 'RespuestaController@store');
$router->get('/respuesta/{respuesta}', 'RespuestaController@show');
$router->get('/respuestaPersona/{persona}', 'RespuestaController@showRespuestas');
$router->put('/respuesta/{respuesta}', 'RespuestaController@update');
$router->patch('/respuesta/{respuesta}', 'RespuestaController@update');
$router->delete('/respuesta/{respuesta}', 'RespuestaController@destroy');

/**
 * Rutas de Personas
 */
$router->get('/personas', 'PersonaController@index');
$router->post('/persona', 'PersonaController@store');
$router->get('/persona/{persona}', 'PersonaController@show');
$router->put('/persona/{persona}', 'PersonaController@update');
$router->patch('/persona/{persona}', 'PersonaController@update');
$router->delete('/persona/{persona}', 'PersonaController@destroy');
/**Rutas personasFamiliares */
$router->post('/personaFamiliar', 'PersonaFamiliarController@store');
$router->put('/personaFamiliar/{persona}', 'PersonaFamiliarController@update');
/**Rutas OtrosFliares */
$router->post('/familiar', 'PersonaFamiliarController@storeOtrosFliares');

//});

/**
 * Rutas de Parentesco
 */
$router->post('/parentesco', 'ParentescoController@store');
$router->get('/pariente/{persona}', 'ParentescoController@showPariente');
