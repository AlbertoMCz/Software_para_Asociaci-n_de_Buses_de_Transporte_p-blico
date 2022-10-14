<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Asignacion extends Model
{
    public $timestamps = false;
    protected $table = 'asignacions';
    protected $fillable = ['fechaInicio','fechaFin', 'rentaDiaria', 'montoRecaudado', 'pagoChofer', 'detalle', 'idTipoAsignacion', 'idMicro', 'idChofer'];

    public function tipoAsignacion()
    {
        return $this->belongsTo(Tipo_asignacion::class,'idTipoAsignacion','id');
    }
    public function micro()
    {
        return $this->belongsTo(Micro::class,'idMicro','id');
    }
    public function chofer()
    {
        return $this->belongsTo(Chofer::class,'idChofer','id');
    }

}
