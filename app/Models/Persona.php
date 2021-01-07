<?php

namespace App\Models;

use Illuminate\Auth\Authenticatable;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Lumen\Auth\Authorizable;

class Persona extends Model implements AuthenticatableContract, AuthorizableContract
{
    protected $table = 'persona';
    use Authenticatable, Authorizable, HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'primerNombre', 
        'segundoNombre',
        'primerApellido', 
        'segundoApellido',
        'apodo', 
        'fechaNacimiento',
        'cedula', 
        'credencialSerie',
        'credencialNumero', 
        'sexo',
        'domicilioActual', 
        'telefono_celular',
        'domicilioAnterior', 
        'correoElectronico', 
        'seccionalPolicial',
        'estadocivil_id',
        'pais_id',
        'tipopersona_id',
        'inscripcion_id',
        'departamento_id'
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'ingresado','tipoPersona_id'
    ];

    //Fks
    public function tipoPersona()
    {
        return $this->hasOne(TipoPersona::class);
    }   

    public function inscripcion()
    {
        return $this->hasOne(Inscripcion::class);
    } 

    public function pais()
    {
        return $this->hasOne(Pais::class);
    }   

    public function departamento_domicilioActual()
    {
        return $this->hasOne(Departamento::class);
    } 

    public function ciudad_domicilioActual()
    {
        return $this->hasOne(CiudadBarrio::class);
    } 

    public function estadoCivil()
    {
        return $this->hasOne(EstadoCivil::class);
    }  

    public function ocupacion()
    {
        return $this->hasOne(Ocupacion::class);
    }  
    
    public function direccionExtranjero()
    {
        return $this->hasOne(DireccionExtranjero::class);
    } 
    
    
    public function respuesta()
    {
        return $this->belongsTo(RespuestaPregunta::class);
    }  

    public function estudios_persona()
    {
        return $this->belongsTo(EstudioPersona::class);
    }  

}
