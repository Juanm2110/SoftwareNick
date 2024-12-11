@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Nuevo Paciente</h1>
    <a href="{{ route('pacientes.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <form method="POST" action="{{ route('pacientes.store') }}">
        @csrf
        <div class="mb-3">
            <label for="nombre_completo" class="form-label">Nombre Completo</label>
            <input type="text" name="nombre_completo" class="form-control" id="nombre_completo" required>
        </div>
        <div class="mb-3">
            <label for="celular" class="form-label">Celular</label>
            <input type="text" name="celular" class="form-control" id="celular" required>
        </div>
        <div class="mb-3">
            <label for="profesion" class="form-label">Profesión</label>
            <input type="text" name="profesion" class="form-control" id="profesion">
        </div>
        <div class="mb-3">
            <label for="motivo_consulta" class="form-label">Motivo de Consulta</label>
            <textarea name="motivo_consulta" class="form-control" id="motivo_consulta" required></textarea>
        </div>
        <div class="mb-3">
            <label for="tratamiento" class="form-label">Tratamiento</label>
            <input type="text" name="tratamiento" class="form-control" id="tratamiento">
        </div>
        <div class="mb-3">
            <label for="medicamentos" class="form-label">Medicamentos</label>
            <input type="text" name="medicamentos" class="form-control" id="medicamentos">
        </div>
        <div class="mb-3">
            <label for="observaciones" class="form-label">Observaciones</label>
            <textarea name="observaciones" class="form-control" id="observaciones"></textarea>
        </div>
        <div class="mb-3">
            <label for="tiempo_en_terapia" class="form-label">Tiempo en Terapia (días)</label>
            <input type="number" name="tiempo_en_terapia" class="form-control" id="tiempo_en_terapia">
        </div>
        <div class="mb-3">
            <label for="fecha_inicio_terapia" class="form-label">Fecha de Inicio de Terapia</label>
            <input type="date" name="fecha_inicio_terapia" class="form-control" id="fecha_inicio_terapia">
        </div>
        <button type="submit" class="btn btn-success">Registrar</button>
    </form>
</div>
@endsection
