<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DatosFamiliares extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'alumno',
        'nombre',
        'ocupacion',
        'telefono',
        'parentesco',
        'emergencia',
    ];

    public function alumno(){
        return $this->belongsToMany(Alumno::class);
    }
}
