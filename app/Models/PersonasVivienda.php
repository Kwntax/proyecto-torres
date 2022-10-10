<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonasVivienda extends Model
{
    use HasFactory;

    protected $table = 'personas_vivienda';

    protected $fillable = [ 
        'id',
        'vive_con',
    ];
    public $incrementing = false;

}
