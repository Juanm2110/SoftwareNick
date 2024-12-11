@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Deuda</h1>

    <form action="{{ route('deudas.update', $deuda) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" value="{{ $deuda->nombre }}" required>
        </div>
        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" name="celular" class="form-control" value="{{ $deuda->celular }}" required>
        </div>
        <div class="form-group">
            <label for="valor_cancelado">Valor Cancelado</label>
            <input type="number" name="valor_cancelado" class="form-control" value="{{ $deuda->valor_cancelado }}" required>
        </div>
        <div class="form-group">
            <label for="valor_total">Valor Total</label>
            <input type="number" name="valor_total" class="form-control" value="{{ $deuda->valor_total }}" required>
        </div>
        <div class="form-group">
            <label for="descripcion_deuda">Descripción</label>
            <textarea name="descripcion_deuda" class="form-control">{{ $deuda->descripcion_deuda }}</textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="pendiente" {{ $deuda->estado == 'pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="cancelada" {{ $deuda->estado == 'cancelada' ? 'selected' : '' }}>Cancelada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
