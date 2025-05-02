<x-app-layout>
    <div class="container mx-auto py-4">
        <h1 class="text-2xl font-bold mb-4">Listado de Eventos</h1>

        @if ($eventos->isEmpty())
            <p>No hay eventos disponibles.</p>
        @else
            <ul class="list-disc pl-6">
                @foreach ($eventos as $evento)
                    <li>
                        <a href="{{ route('eventos.show', $evento) }}" class="text-blue-600 hover:underline">
                            {{ $evento->nombre }}
                        </a> ({{ $evento->fecha }})
                    </li>
                @endforeach
            </ul>
        @endif
    </div>
</x-app-layout>
