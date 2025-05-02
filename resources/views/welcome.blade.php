<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido - Sistema de Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container text-center mt-5">
        <h1 class="mb-4">Sistema de Registro de Eventos Extracurriculares</h1>
        <p class="lead">Regístrate, inscríbete en eventos y sube tus evidencias de participación.</p>

        <div class="mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary me-2">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="btn btn-success">Registrarse</a>
        </div>
    </div>
</body>
</html>
