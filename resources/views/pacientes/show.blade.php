@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Encabezado del Paciente -->
    <div class="card shadow mb-4">
        <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
            <h3><i class="fas fa-user"></i> {{ $paciente->nombre_completo }}</h3>
            <span><i class="fas fa-phone"></i> {{ $paciente->celular }}</span>
        </div>
    </div>

    <!-- Botón para regresar -->
    <div class="mb-3">
        <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left"></i> Volver
        </a>
    </div>

    <!-- Información del Paciente -->
    <div class="row">
        <!-- Primera columna -->
        <div class="col-md-6">
            <div class="card shadow mb-3">
                <div class="card-header bg-info text-white">Datos Básicos</div>
                <div class="card-body">
                    <p><strong>Nombre Completo:</strong> {{ $paciente->nombre_completo }}</p>
                    <p><strong>Celular:</strong> {{ $paciente->celular }}</p>
                    <p><strong>Profesión:</strong> {{ $paciente->profesion }}</p>
                </div>
            </div>

            <div class="card shadow mb-3">
                <div class="card-header bg-warning text-white">Consulta</div>
                <div class="card-body">
                    <p><strong>Motivo de Consulta:</strong> {{ $paciente->motivo_consulta }}</p>
                    <p><strong>Tratamiento:</strong> {{ $paciente->tratamiento }}</p>
                </div>
            </div>
        </div>

        <!-- Segunda columna -->
        <div class="col-md-6">
            <div class="card shadow mb-3">
                <div class="card-header bg-success text-white">Seguimiento</div>
                <div class="card-body">
                    <p><strong>Medicamentos:</strong> {{ $paciente->medicamentos }}</p>
                    <p><strong>Observaciones:</strong> {{ $paciente->observaciones }}</p>
                </div>
            </div>

            <div class="card shadow mb-3">
                <div class="card-header bg-secondary text-white">Terapia</div>
                <div class="card-body">
                    <p><strong>Tiempo en Terapia:</strong> {{ $paciente->tiempo_en_terapia }} días</p>
                    <p><strong>Fecha de Inicio de Terapia:</strong> {{ $paciente->fecha_inicio_terapia }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Botón para descargar historia clínica -->
    <div class="mt-3 text-center">
        <a href="{{ route('pacientes.historia_clinica', $paciente->id) }}" class="btn btn-primary btn-lg">
            <i class="fas fa-file-download"></i> Descargar Historia Clínica
        </a>
    </div>
</div>
@endsection
