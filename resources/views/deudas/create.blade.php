@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Registrar Deuda</h1>

    <form action="{{ route('deudas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="celular">Celular</label>
            <input type="text" name="celular" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="valor_cancelado">Valor Cancelado</label>
            <input type="number" name="valor_cancelado" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="valor_total">Valor Total</label>
            <input type="number" name="valor_total" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion_deuda">Descripción</label>
            <textarea name="descripcion_deuda" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control" required>
                <option value="pendiente">Pendiente</option>
                <option value="cancelada">Cancelada</option>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
