@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="mb-4">Agendar Nueva Cita</h1>

    <form action="{{ route('citas.store') }}" method="POST">
        @csrf
        {{-- Número de celular --}}
        <div class="mb-3">
            <label for="celular" class="form-label">Número de Celular</label>
            <input type="text" name="celular" id="celular" class="form-control" required>
        </div>
        
        {{-- Nombre del paciente --}}
        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre del Paciente</label>
            <input type="text" name="nombre" id="nombre" class="form-control" required>
        </div>
        
        {{-- Fecha de la cita --}}
        <div class="mb-3">
            <label for="fecha" class="form-label">Fecha de la Cita</label>
            <input type="date" name="fecha" id="fecha" class="form-control" required>
        </div>
        
        {{-- Hora de la cita --}}
        <div class="mb-3">
            <label for="hora" class="form-label">Hora de la Cita</label>
            <input type="time" name="hora" id="hora" class="form-control" required>
        </div>
        
        {{-- Estado --}}
        <div class="mb-3">
            <label for="estado" class="form-label">Estado</label>
            <select name="estado" id="estado" class="form-control" required>
                <option value="Pendiente">Pendiente</option>
                <option value="Asistida">Asistida</option>
                <option value="Cancelada">Cancelada</option>
            </select>
        </div>
        
        <button type="submit" class="btn btn-success">Agendar Cita</button>
    </form>
</div>
@endsection
