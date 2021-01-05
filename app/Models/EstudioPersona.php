<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class EstudioPersona extends Model implements AuthenticatableContract, AuthorizableContract
{
    protected $table = 'estudiopersona';
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'anioEstudio', 'nombreInstituto',
    ];

    public function persona()
    {
        return $this->hasOne(Persona::class);
    }  

    public function tipoEstudio()
    {
        return $this->hasOne(TipoEstudio::class);
    }  


}
