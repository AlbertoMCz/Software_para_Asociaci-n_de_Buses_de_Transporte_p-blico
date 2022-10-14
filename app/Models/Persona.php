<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;


class Persona extends Model
{
    public $timestamps = false;
    protected $table = 'personas';
    protected $fillable = ['nombre','apellido', 'fechaNacimiento', 'ci', 'nacionalidad', 'genero', 'tipoPersona'];

    //Devuelve la palabra de la abreviatura del tipo de persona e.g. [S = Socio]; [C = Chofer]
    public function tipo($tipoPersona)
    {
        return Str::startsWith($tipoPersona, 'S')? "Socio" : (Str::startsWith($tipoPersona, 'C')? "Chofer" : "Sin Rol");
        //return ($tipoPersona = 'S'  ? "Socio" : ($tipoPersona = 'C' ? "Chofer" : "Sin Rol"));
    }

    //Devuelve la palabra "checked" para asignarlo en el checkbox Socio de la vista del formulario para registrar o editar.
    public function checkedS($tipoPersona)
    {
        return (Str::startsWith($tipoPersona, 'S')? 'checked' : '');
    }

    //Devuelve la palabra "checked" para asignarlo en el checkbox Chofer de la vista del formulario para registrar o editar.
    public function checkedC($tipoPersona)
    {
        return (Str::startsWith($tipoPersona, 'C')? 'checked' : '');
    }

}
