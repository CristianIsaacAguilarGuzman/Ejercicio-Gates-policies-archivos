<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventoController;
use App\Models\Evento;

Route::get('/', function () {
    $eventos = Evento::where('fecha', '>=', now())->orderBy('fecha')->get();
    return view('welcome', compact('eventos'));
});

Route::get('/dashboard', function () {
    return redirect()->route('eventos.index');
    })->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Protege estas rutas también:
    Route::get('/eventos', [EventoController::class, 'index'])->name('eventos.index');
    Route::get('/eventos/{evento}', [EventoController::class, 'show'])->name('eventos.show');
});

Route::post('/eventos/{evento}/inscribirse', [EventoController::class, 'inscribirse'])
    ->name('eventos.inscribirse')
    ->middleware(['auth']);

Route::delete('/eventos/{evento}/cancelar', [EventoController::class, 'cancelarInscripcion'])
    ->name('eventos.cancelar')
    ->middleware(['auth']);


require __DIR__.'/auth.php';
