@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3><i class="fas fa-user-edit"></i> Editar Paciente</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('pacientes.update', $paciente->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Nombre Completo -->
                <div class="mb-3">
                    <label for="nombre_completo" class="form-label">Nombre Completo:</label>
                    <input type="text" name="nombre_completo" id="nombre_completo" class="form-control" 
                           value="{{ $paciente->nombre_completo }}" required placeholder="Ingrese el nombre completo">
                </div>

                <!-- Celular -->
                <div class="mb-3">
                    <label for="celular" class="form-label">Celular:</label>
                    <input type="text" name="celular" id="celular" class="form-control" 
                           value="{{ $paciente->celular }}" required placeholder="Ingrese el número de celular">
                </div>

                <!-- Profesión -->
                <div class="mb-3">
                    <label for="profesion" class="form-label">Profesión:</label>
                    <input type="text" name="profesion" id="profesion" class="form-control" 
                           value="{{ $paciente->profesion }}" placeholder="Ingrese la profesión">
                </div>

                <!-- Motivo de Consulta -->
                <div class="mb-3">
                    <label for="motivo_consulta" class="form-label">Motivo de Consulta:</label>
                    <textarea name="motivo_consulta" id="motivo_consulta" rows="2" class="form-control" 
                              required placeholder="Describa el motivo de la consulta">{{ $paciente->motivo_consulta }}</textarea>
                </div>

                <!-- Tratamiento -->
                <div class="mb-3">
                    <label for="tratamiento" class="form-label">Tratamiento:</label>
                    <input type="text" name="tratamiento" id="tratamiento" class="form-control" 
                           value="{{ $paciente->tratamiento }}" placeholder="Ingrese el tratamiento">
                </div>

                <!-- Medicamentos -->
                <div class="mb-3">
                    <label for="medicamentos" class="form-label">Medicamentos:</label>
                    <input type="text" name="medicamentos" id="medicamentos" class="form-control" 
                           value="{{ $paciente->medicamentos }}" placeholder="Ingrese los medicamentos">
                </div>

                <!-- Observaciones -->
                <div class="mb-3">
                    <label for="observaciones" class="form-label">Observaciones:</label>
                    <textarea name="observaciones" id="observaciones" rows="3" class="form-control" 
                              placeholder="Ingrese observaciones">{{ $paciente->observaciones }}</textarea>
                </div>

                <!-- Tiempo en Terapia -->
                <div class="mb-3">
                    <label
                    for="tiempo_terapia" class="form-label">Tiempo en Terapia (en semanas):</label> <input type="number" name="tiempo_terapia" id="tiempo_terapia" class="form-control" value="{{ $paciente->tiempo_terapia }}" placeholder="Ingrese el tiempo en semanas"> </div>
                                <!-- Fecha de Inicio -->
            <div class="mb-3">
                <label for="fecha_inicio_terapia" class="form-label">Fecha de Inicio de Terapia:</label>
                <input type="date" name="fecha_inicio_terapia" id="fecha_inicio_terapia" class="form-control" 
                       value="{{ $paciente->fecha_inicio_terapia }}">
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('pacientes.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Cancelar
                </a>
                <button type="submit" class="btn btn-success">
                    <i class="fas fa-save"></i> Guardar Cambios
                </button>
            </div>
        </form>
    </div>
</div>
</div> 
@endsection