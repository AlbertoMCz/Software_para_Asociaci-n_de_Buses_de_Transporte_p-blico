<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_asignacion extends Model
{
    public $timestamps = false;
    protected $table = 'tipo_asignaciones';
    protected $fillable = ['nombre','detalle'];

    public function asignacion()
    {
        return $this->hasMany(Asignacion::class,'idTipoAsignacion');
    }
}
