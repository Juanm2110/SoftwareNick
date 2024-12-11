@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Editar Producto</h1>
    <a href="{{ route('productos.index') }}" class="btn btn-secondary mb-3">Volver</a>

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre">Nombre del Producto</label>
            <input type="text" name="nombre" value="{{ $producto->nombre }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción</label>
            <textarea name="descripcion" class="form-control">{{ $producto->descripcion }}</textarea>
        </div>
        <div class="form-group">
            <label for="precio_compra">Precio de Compra</label>
            <input type="number" step="0.01" name="precio_compra" value="{{ $producto->precio_compra }}" class="form-control" required>
        </div>
        <div class="form-group">
            <label for="precio_venta">Precio de Venta</label>
            <input type="number" step="0.01" name="precio_venta" value="{{ $producto->precio_venta }}" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
</div>
@endsection
