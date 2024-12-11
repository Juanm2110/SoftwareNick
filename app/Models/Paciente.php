<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paciente extends Model
{
    use HasFactory;

    // Habilita asignación masiva para los campos permitidos
    protected $fillable = [
        'nombre_completo',
        'celular',
        'profesion',
        'motivo_consulta',
        'tratamiento',
        'medicamentos',
        'observaciones',
        'tiempo_en_terapia',
        'fecha_inicio_terapia',
    ];

    // Relación con Cita (un paciente tiene muchas citas)
    public function citas()
    {
        return $this->hasMany(Cita::class);
    }
}
