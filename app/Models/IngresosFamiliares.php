<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngresosFamiliares extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'ingresos_familiares',
    ];

    public $incrementing = false;
}