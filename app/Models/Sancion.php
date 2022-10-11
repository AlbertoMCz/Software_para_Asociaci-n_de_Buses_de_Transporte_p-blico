<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sancion extends Model
{
    public $timestamps = false;
    protected $table = 'sancions';
    protected $fillable = ['detalle','montoApagar'];

    public function asignacionsancion()
    {
        //return $this->hasMany(Asignacion::class,)
    }
}
