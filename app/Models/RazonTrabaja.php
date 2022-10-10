<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RazonTrabaja extends Model
{
    use HasFactory;

    protected $table = 'razones_trabajo';

    protected $fillable = [
        'id',
        'razon',
    ];
    public $incrementing = false;
}
