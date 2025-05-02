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
        @endif
    @endauth
</div>
@endsection
