<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    public $timestamps = false;
    protected $table = 'personas';
    protected $fillable = ['nombre','apellido', 'fechaNacimiento', 'ci', 'nacionalidad', 'genero', 'tipoPersona'];

}
