<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido - Sistema de Eventos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <h1 class="text-center mb-4">Sistema de Registro de Eventos Extracurriculares</h1>
        <p class="lead text-center">Regístrate, inscríbete en eventos y sube tus evidencias de participación.</p>

        <div class="text-center mt-4">
            <a href="{{ route('login') }}" class="btn btn-primary me-2">Iniciar sesión</a>
            <a href="{{ route('register') }}" class="btn btn-success">Registrarse</a>
        </div>

        <hr class="my-5">

        <h2 class="text-center mb-4">Eventos próximos</h2>

        @if ($eventos->isEmpty())
            <p class="text-center">No hay eventos próximos disponibles.</p>
        @else
            <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
                @foreach ($eventos as $evento)
                    <div class="col">
                        <div class="card h-100">
                            <div class="card-body">
                                <h5 class="card-title">{{ $evento->nombre }}</h5>
                                <p class="card-text">{{ $evento->descripcion }}</p>
                                <p class="text-muted">Fecha: {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}</p>
                                <a href="{{ route('eventos.show', $evento) }}" class="btn btn-outline-primary">Ver más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</body>
</html>
