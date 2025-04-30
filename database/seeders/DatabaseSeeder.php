<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Evita duplicados con updateOrCreate
        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => bcrypt('password'), // puedes cambiar la contraseña
            ]
        );

        // Ejecutar otros seeders si los agregas después
        $this->call([
            EventoSeeder::class, // ← si ya creaste este seeder
        ]);
    }
}
