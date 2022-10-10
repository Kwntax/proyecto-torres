<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EstadosCiviles extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'estado_civil',
    ];
    public $incrementing = false;
}
