<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class User extends Model implements AuthenticatableContract, AuthorizableContract
{
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'primerNombre', 'segundoNombre',
        'primerApellido', 'segundoApellido',
        'apodo', 'fechaNacimiento',
        'cedula', 'credencialSerie',
        'credencialNumero', 'domicilioActual',
        'telefono_celular', 'domicilioAnterior',
        'correoElectronico', 'seccionalPolicial',
    ];

        /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'ingresado',
    ];

}
