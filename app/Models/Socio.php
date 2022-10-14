<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Socio extends Model
{
    public $timestamps = false;
    protected $table = 'socios';
    protected $fillable = ['id', 'codigo','email'];

    //Obtengo los datos del registro relacionado a la tabla persona.
    public function persona()
    {
        return $this->belongsTo(Persona::class,'id','id');
    }
}
