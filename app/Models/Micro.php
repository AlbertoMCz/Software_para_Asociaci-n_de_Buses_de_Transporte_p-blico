<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Micro extends Model
{
    public $timestamps = false;
    protected $table = 'micros';
    protected $fillable = ['nroPlaca','nroInterno', 'marca', 'modelo', 'disponible', 'descripcion', 'idSocio'];

    public function socio()
    {
        return $this->belongsTo(Socio::class,'idSocio','id');
    }
}
