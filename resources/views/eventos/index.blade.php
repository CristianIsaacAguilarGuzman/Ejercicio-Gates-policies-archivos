@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Listado de Eventos</h1>

        @if ($eventos->isEmpty())
            <p>No hay eventos disponibles.</p>
        @else
            <ul>
                @foreach ($eventos as $evento)
                    <li>
                        <a href="{{ route('eventos.show', $evento) }}">{{ $evento->nombre }}</a>
                        ({{ $evento->fecha }})
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
