<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Visitas extends Model
{
    use HasFactory;
    protected $table = "visitas";
    protected $fillable = [
        'documento',
        'visitante',
        'telefono',
        'hora_ingreso',
        'hora_salida',
    ];
}
