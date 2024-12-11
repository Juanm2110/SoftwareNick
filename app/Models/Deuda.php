<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deuda extends Model
{
    protected $fillable = [
        'nombre',
        'celular',
        'valor_cancelado',
        'valor_total',
        'descripcion_deuda',
        'estado',
    ];
}
