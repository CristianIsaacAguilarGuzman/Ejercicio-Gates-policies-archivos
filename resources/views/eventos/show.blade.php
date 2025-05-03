@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $evento->nombre }}</h1>
    <p>{{ $evento->descripcion }}</p>
    <p><strong>Fecha:</strong> {{ $evento->fecha }}</p>

    @auth
        @if (auth()->user()->is_admin)
            <p class="text-warning">Eres administrador. No puedes inscribirte.</p>
        @elseif ($evento->usuarios->contains(auth()->user()->id))
            <p class="text-success">Ya estás inscrito en este evento.</p>
        @else
            <form method="POST" action="{{ route('eventos.inscribirse', $evento) }}">
                @csrf
                <button class="btn btn-primary">Inscribirse</button>
            </form>
            <form action="{{ route('eventos.cancelar', $evento) }}" method="POST" class="mt-2">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                    Cancelar inscripción
                </button>
            </form>
        @endif
    @endauth

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    @auth
        @if (!auth()->user()->is_admin)
            <form method="POST" action="{{ route('eventos.inscribirse', $evento->id) }}">
                @csrf
                <button type="submit" class="btn btn-primary">Inscribirse</button>
            </form>
        @endif
    @endauth

        @if (auth()->check() && auth()->user()->is_admin)
        <h4>Usuarios inscritos:</h4>
        <ul>
            @forelse ($evento->usuarios as $usuario)
                <li>{{ $usuario->name }} ({{ $usuario->email }})</li>
            @empty
                <li>No hay usuarios inscritos todavía.</li>
            @endforelse
        </ul>
    @endif


</div>
@endsection
