<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cita extends Model
{
    use HasFactory;

    // Habilita asignación masiva para los campos permitidos
    protected $fillable = [
        'celular',
        'nombre',
        'fecha',
        'hora',
        'estado',
    ];

    // Relación con Paciente (muchas citas pertenecen a un paciente)
    public function paciente()
    {
        return $this->belongsTo(Paciente::class, 'celular', 'celular');
    }
}
