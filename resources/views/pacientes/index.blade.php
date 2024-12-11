@extends('layouts.app')

@section('content')
<div class="container">
    <!-- Título con icono -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="text-primary">
            <i class="fas fa-users-medical"></i> Gestión de Pacientes
        </h1>
        <a href="{{ route('pacientes.create') }}" class="btn btn-success">
            <i class="fas fa-user-plus"></i> Registrar Nuevo Paciente
        </a>
    </div>

    <!-- Formulario de búsqueda -->
    <form method="GET" action="{{ route('pacientes.index') }}" class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Buscar por nombre o celular" value="{{ request('search') }}">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-search"></i> Buscar
        </button>
    </form>

    <!-- Tabla de pacientes -->
    <div class="card shadow">
        <div class="card-header bg-info text-white">
            <h4 class="mb-0"><i class="fas fa-clipboard-list"></i> Pacientes Registrados</h4>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nombre Completo</th>
                        <th>Celular</th>
                        <th>Profesión</th>
                        <th>Motivo Consulta</th>
                        <th class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pacientes as $paciente)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $paciente->nombre_completo }}</td>
                            <td>{{ $paciente->celular }}</td>
                            <td>{{ $paciente->profesion }}</td>
                            <td>{{ $paciente->motivo_consulta }}</td>
                            <td class="text-center">
                                <a href="{{ route('pacientes.show', $paciente->id) }}" class="btn btn-info btn-sm" title="Ver Más">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('pacientes.edit', $paciente->id) }}" class="btn btn-warning btn-sm" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('pacientes.destroy', $paciente->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" title="Eliminar">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center">No se encontraron pacientes</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            <div class="mt-3">
                {{ $pacientes->links() }}
            </div>
        </div>
    </div>
</div>
@endsection
