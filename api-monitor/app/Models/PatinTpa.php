<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PatinTpa extends Model
{
    use HasFactory;

    protected $table = 'patin_tpa';

    protected $fillable = [
        'nombre',
        'presion',
        'flujo',
        'temperatura',
        'densidad',
        'densidadCorr',
        'grossiv',
        'netgsv',
        'fqi',
    ];

    const CREATED_AT = 'creado';
    const UPDATED_AT = 'actualizado';
}
