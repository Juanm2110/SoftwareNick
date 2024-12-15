@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Gestión de Deudas</h1>
        <a href="{{ route('deudas.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Registrar Deuda
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-striped align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Nombre</th>
                    <th>Celular</th>
                    <th>Valor Cancelado</th>
                    <th>Valor Total</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($deudas as $deuda)
                    <tr>
                        <td>{{ $deuda->nombre }}</td>
                        <td>{{ $deuda->celular }}</td>
                        <td>${{ number_format($deuda->valor_cancelado, 2) }}</td>
                        <td>${{ number_format($deuda->valor_total, 2) }}</td>
                        <td>{{ $deuda->descripcion_deuda }}</td>
                        <td>
                            <span class="badge 
                                {{ $deuda->estado === 'pendiente' ? 'bg-warning text-dark' : '' }}
                                {{ $deuda->estado === 'cancelada' ? 'bg-success' : '' }}
                                {{ $deuda->estado === 'atrasada' ? 'bg-danger' : '' }}">
                                {{ ucfirst($deuda->estado) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('deudas.edit', $deuda) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('deudas.destroy', $deuda) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" >
                                    <i class="fas fa-trash-alt"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
