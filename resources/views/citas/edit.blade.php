@extends('layouts.app')

@section('content')
    <h1>Editar Cita</h1>

    <form action="{{ route('citas.update', $cita->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="celular">Número de Celular</label>
        <input type="text" name="celular" id="celular" class="form-control" value="{{ old('celular', $cita->celular) }}" required>
    </div>

    <div class="form-group">
        <label for="fecha">Fecha</label>
        <input type="date" name="fecha" id="fecha" class="form-control" value="{{ old('fecha', $cita->fecha) }}" required>
    </div>

    <div class="form-group">
        <label for="hora">Hora</label>
        <input type="time" name="hora" id="hora" class="form-control" value="{{ old('hora', $cita->hora) }}" required>
    </div>

    <div class="form-group">
        <label for="estado">Estado</label>
        <select name="estado" id="estado" class="form-control" required>
            <option value="Pendiente" {{ $cita->estado === 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
            <option value="Asistida" {{ $cita->estado === 'Asistida' ? 'selected' : '' }}>Asistida</option>
            <option value="Cancelada" {{ $cita->estado === 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
</form>

@endsection
