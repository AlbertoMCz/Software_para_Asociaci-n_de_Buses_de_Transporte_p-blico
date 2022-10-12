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

    public function tipo($tipoPersona)
    {
        return Str::startsWith($tipoPersona, 'S')? "Socio" : (Str::startsWith($tipoPersona, 'C')? "Chofer" : "Sin Rol");
        //return ($tipoPersona = 'S'  ? "Socio" : ($tipoPersona = 'C' ? "Chofer" : "Sin Rol"));
    }

}
