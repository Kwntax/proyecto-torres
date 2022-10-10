<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoBachillerato extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'tipo_bachillerato',
    ];
    public $incrementing = false;
}
