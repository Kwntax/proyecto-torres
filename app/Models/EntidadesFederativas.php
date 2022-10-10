<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class EntidadesFederativas extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'entidad_federativa',
    ];

    public $incrementing = false;
}
