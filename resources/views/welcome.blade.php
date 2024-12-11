<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            text-align: center;
            height: 100vh;
            background: url('/images/inicio.jpg') no-repeat center center fixed;
            background-size: cover;
            color: #fff;
        }

        .content {
            background-color: rgba(0, 0, 0, 0.6); /* Fondo semitransparente */
            padding: 20px;
            border-radius: 10px;
        }

        h1 {
            font-size: 3rem;
            margin-bottom: 20px;
        }

        p {
            font-size: 1.5rem;
            font-style: italic;
        }

        a {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background: #4caf50;
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            border-radius: 5px;
            transition: background 0.3s;
        }

        a:hover {
            background: #45a049;
        }
    </style>
</head>
<body>
    <div class="content">
        <h1>Bienvenido al Sistema de Gestión de Pacientes</h1>
        <p>"Dios es nuestro amparo y fortaleza, nuestro pronto auxilio en las tribulaciones"</p>
        <a href="{{ route('login') }}">Iniciar Sesión</a>
        <a href="{{ route('register') }}">Registrarse</a>
    </div>
</body>
</html>
