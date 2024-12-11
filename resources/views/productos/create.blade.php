@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Crear Producto</h1>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" name="nombre" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control"></textarea>
        </div>
        <div class="form-group">
            <label for="precio_compra">Precio de Compra</label>
            <input type="number" step="0.01" name="precio_compra" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="precio_venta">Precio de Venta</label>
            <input type="number" step="0.01" name="precio_venta" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
