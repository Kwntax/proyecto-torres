<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosEconomicos extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'alumno',
        'ingresos',
        'tipo_vivienda',
        'vive_con',
        'tipo_transporte',
        'persona_apoyo_economico',
    ];
}
