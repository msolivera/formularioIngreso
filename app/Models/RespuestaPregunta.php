<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class RespuestaPregunta extends Model implements AuthenticatableContract, AuthorizableContract
{
    protected $table = 'respuesta_pregunta';
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'respuesta', 'observaciones', 'persona_id', 'pregunta_id'
    ];

    public function personas()
    {
        return $this->hasOne(Persona::class);
    }

    public function preguntas()
    {
        return $this->hasOne(Pregunta::class);
    }
}
