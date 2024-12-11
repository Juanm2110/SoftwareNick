@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    
@stop

@section('content')
    <div class="imagen-container">
        <img src="{{ asset('images/versiculo.jpg') }}" alt="Versículo Bíblico" class="imagen-versiculo">
    </div>

    @if(session('notificaciones'))
        <div id="notificacion-cuadro" class="notificacion-cuadro">
            <p>
                @if(count(session('notificaciones')) > 1)
                    Tienes nuevas citas agendadas.
                @else
                    {{ session('notificaciones')[0] }}
                @endif
            </p>
            <button id="revisar-citas" onclick="location.href='{{ route('citas.index') }}'">Revisar</button>
            <button id="cerrar-notificacion" onclick="cerrarNotificacion()">Aceptar</button>
        </div>
    @endif
@stop

@section('css')
    {{-- Estilos personalizados --}}
    <style>
        /* Imagen Estilo */
        .imagen-container {
            margin: 20px 0;
            text-align: center;
        }
        .imagen-versiculo {
            max-width: 100%;
            height: auto;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        /* Notificación Estilo */
        .notificacion-cuadro {
            position: fixed;
            bottom: 20px;
            right: 20px;
            background: #f1c40f;
            color: #fff;
            padding: 15px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
            z-index: 1000;
        }
        .notificacion-cuadro button {
            margin: 5px;
            padding: 5px 10px;
            border: none;
            background: #34495e;
            color: #fff;
            border-radius: 4px;
            cursor: pointer;
        }
        .notificacion-cuadro button:hover {
            background: #2c3e50;
        }
    </style>
@stop

@section('js')
    <script>
        console.log("Hi, I'm using the Laravel-AdminLTE package!");

        function cerrarNotificacion() {
            const cuadro = document.getElementById('notificacion-cuadro');
            cuadro.style.display = 'none';

            // Eliminar las notificaciones de la sesión mediante AJAX
            fetch("{{ route('notificaciones.clear') }}", {
                method: "POST",
                headers: {
                    "X-CSRF-TOKEN": "{{ csrf_token() }}",
                },
            });
        }
    </script>
@stop
