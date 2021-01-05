<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Departamento extends Model implements AuthenticatableContract, AuthorizableContract
{
    protected $table = 'departamento';
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre',
    ];

    public function persona()
    {
        return $this->belongsTo(Persona::class);
    }  

    public function ciudad()
    {
        return $this->belongsTo(CiudadBarrio::class);
    }  


}
