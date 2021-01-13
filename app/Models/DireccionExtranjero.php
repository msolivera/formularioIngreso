<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class DireccionExtranjero extends Model implements AuthenticatableContract, AuthorizableContract
{

    protected $table = 'direccionextranjeros';
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre_ciudad', 'nombre_departamento_estado', 'pais_id', 'persona_id'
    ];

    public function pais()
    {
        return $this->hasOne(Pais::class);
    }
    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }
}
