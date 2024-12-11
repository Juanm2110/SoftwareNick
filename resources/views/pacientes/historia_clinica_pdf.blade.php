<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historia Clínica</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
            padding: 10px 0;
            border-bottom: 2px solid #007BFF;
        }
        .header h1 {
            margin: 0;
            font-size: 24px;
        }
        .header .verse {
            font-style: italic;
            color: #555;
            margin-top: 10px;
            font-size: 14px;
        }
        .content {
            margin: 20px;
        }
        .content h2 {
            font-size: 18px;
            color: #007BFF;
            margin-bottom: 10px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        table th, table td {
            border: 1px solid #ddd;
            padding: 8px;
            vertical-align: top;
        }
        table th {
            background-color: #f8f9fa;
            text-align: left;
        }
        table td {
            word-wrap: break-word; /* Rompe palabras largas */
            white-space: pre-wrap; /* Mantiene saltos de línea */
            overflow-wrap: break-word; /* Ajusta texto que se desborda */
            max-width: 400px; /* Establece un ancho máximo para las celdas */
        }
        .footer {
            text-align: center;
            font-size: 12px;
            margin-top: 20px;
            padding: 10px 0;
            border-top: 1px solid #ddd;
        }
        .footer p {
            margin: 5px 0;
        }
    </style>
</head>
<body>
    <!-- Cabecera -->
    <div class="header">
        <h1>Historia Clínica</h1>
        <p><strong>Paciente:</strong> {{ $paciente->nombre_completo }}</p>
        <p class="verse">"Jehová te guardará de todo mal; Él guardará tu alma. Jehová guardará tu salida y tu entrada desde ahora y para siempre." - Salmos 121:7-8</p>
    </div>

    <!-- Contenido -->
    <div class="content">
        <h2>Información Básica</h2>
        <table>
            <tr>
                <th>Celular</th>
                <td>{{ $paciente->celular }}</td>
            </tr>
            <tr>
                <th>Profesión</th>
                <td>{{ $paciente->profesion }}</td>
            </tr>
        </table>

        <h2>Consulta</h2>
        <table>
            <tr>
                <th>Motivo de Consulta</th>
                <td>{{ $paciente->motivo_consulta }}</td>
            </tr>
            <tr>
                <th>Tratamiento</th>
                <td>{{ $paciente->tratamiento }}</td>
            </tr>
            <tr>
                <th>Medicamentos</th>
                <td>{{ $paciente->medicamentos }}</td>
            </tr>
        </table>

        <h2>Detalles Adicionales</h2>
        <table>
            <tr>
                <th>Observaciones</th>
                <td title="{{ $paciente->observaciones }}">{{ $paciente->observaciones }}</td>
            </tr>
            <tr>
                <th>Tiempo en Terapia</th>
                <td>{{ $paciente->tiempo_en_terapia }} días</td>
            </tr>
            <tr>
                <th>Fecha de Inicio de Terapia</th>
                <td>{{ $paciente->fecha_inicio_terapia }}</td>
            </tr>
        </table>
    </div>

    <!-- Pie de página -->
    <div class="footer">
        <p>Sistema de Gestión de Pacientes - Fisioterapeuta Profesional</p>
        <p><strong>Nicolás Moya</strong>, Celular: 3115447036</p>
        <p>Dirección: Calle 70 C No. 116B - 28</p>
        <p>Generado el: {{ now()->format('d/m/Y') }}</p>
    </div>
</body>
</html>
