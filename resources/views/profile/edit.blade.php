<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
            <hr class="my-4">
            <h2 class="text-lg font-semibold">Eventos inscritos</h2>
            @if (auth()->user()->eventos->count() > 0)
                <ul class="list-disc list-inside mt-2">
                @foreach (auth()->user()->eventos as $evento)
                    <li class="mb-2">
                        <strong>{{ $evento->nombre }}</strong> – {{ \Carbon\Carbon::parse($evento->fecha)->format('d/m/Y') }}

                        <form action="{{ route('eventos.cancelar', $evento) }}" method="POST" class="inline-block ml-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:underline text-sm" onclick="return confirm('¿Estás seguro de cancelar tu inscripción?')">
                                Cancelar inscripción
                            </button>
                        </form>
                    </li>
                @endforeach
                </ul>
            @else
                <p class="text-gray-600 mt-2">No estás inscrito en ningún evento todavía.</p>
            @endif
        </div>
    </div>
</x-app-layout>
