<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApoyoEconomico extends Model
{
    use HasFactory;

    protected $table = 'apoyos_economicos';
    protected $fillable = [
        'id',
        'apoyo_economico',
    ];
    public $incrementing = false;
}
