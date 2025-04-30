@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $evento->nombre }}</h1>
    <p>{{ $evento->descripcion }}</p>
    <p><strong>Fecha:</strong> {{ $evento->fecha }}</p>

    {{-- Aquí después agregaremos lógica para inscripción, carga de archivos, etc --}}
</div>
@endsection
