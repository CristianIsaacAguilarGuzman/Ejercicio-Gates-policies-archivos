<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Evento;

class EventoSeeder extends Seeder
{
    public function run()
    {
        Evento::create([
            'nombre' => 'Taller de Laravel',
            'descripcion' => 'Curso básico de Laravel.',
            'fecha' => now()->addDays(3),
        ]);

        Evento::create([
            'nombre' => 'Conferencia de Tecnología',
            'descripcion' => 'Evento sobre las últimas tendencias.',
            'fecha' => now()->addDays(7),
        ]);
    }
}
