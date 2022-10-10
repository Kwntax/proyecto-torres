<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosPersonales extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'alumno',
        'fecha_nacimiento',
        'edad',
        'ciudad_nacimiento',
        'municipio_estado',
        'domicilio',
        'telefono_celular',
        'telefono_casa',
        'correo_personal',
        'correo_institucional',
        'estado_civil',
    ];

    public function alumno(){
        return $this->belongsToMany(Alumno::class,'id');
    }
}
