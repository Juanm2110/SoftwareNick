<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    // Habilita asignación masiva para los campos permitidos
    protected $fillable = [
        'nombre',
        'descripcion',
        'precio_compra',
        'precio_venta',
    ];
}
