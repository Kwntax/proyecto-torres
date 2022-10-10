<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bachillerato extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tipo',
        'nombre',
        'entidad_federativa',
    ];
}
