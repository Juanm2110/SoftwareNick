@extends('layouts.app')

@section('content')
<div class="container">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">Gestión de Citas</h1>
        <a href="{{ route('citas.create') }}" class="btn btn-success">
            <i class="fas fa-plus-circle"></i> Registrar Nueva Cita
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
                    <th>Nombre del Paciente</th>
                    <th>Celular</th>
                    <th>Fecha</th>
                    <th>Hora</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($citas as $cita)
                    <tr>
                        <td>{{ $cita->nombre }}</td>
                        <td>{{ $cita->celular }}</td>
                        <td>{{ \Carbon\Carbon::parse($cita->fecha)->format('d/m/Y') }}</td>
                        <td>{{ \Carbon\Carbon::parse($cita->hora)->format('h:i A') }}</td>
                        <td>
                            <span class="badge 
                                {{ $cita->estado === 'Pendiente' ? 'bg-warning text-dark' : '' }}
                                {{ $cita->estado === 'Asistida' ? 'bg-success' : '' }}
                                {{ $cita->estado === 'Cancelada' ? 'bg-danger' : '' }}">
                                {{ ucfirst($cita->estado) }}
                            </span>
                        </td>
                        <td>
                            <a href="{{ route('citas.edit', $cita->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('citas.destroy', $cita->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('¿Estás seguro?')">
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
