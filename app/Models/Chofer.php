<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Chofer extends Model
{
    public $timestamps = false;
    protected $table = 'chofers';
    protected $fillable = ['id', 'nroLicencia','categoria', 'disponible'];

    public function persona()
    {
        return $this->belongsTo(Persona::class,'id','id');
    }
}
