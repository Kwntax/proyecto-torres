<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosEscolares extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'alumno',
        'bachillerato',
        'tipo_bachilerato',
        'entidad_federativa',
    ];
}
