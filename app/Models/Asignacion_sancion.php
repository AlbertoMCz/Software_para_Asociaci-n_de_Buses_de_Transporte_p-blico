<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion_sancion extends Model
{
    public $timestamps = false;
    protected $table = 'asignaciones_sanciones';
    protected $fillable = ['id', 'idSancion', 'motivo'];

    public function asignacion()
    {
        return $this->belongsTo(Asignacion::class,'id','id');
    }
    public function sancion()
    {
        return $this->belongsTo(Sancion::class,'idSancion','id');
    }
}
