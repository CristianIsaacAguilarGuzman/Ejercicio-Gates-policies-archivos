<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class EventoController extends Controller
{
    // Mostrar eventos con fecha igual o mayor a hoy
    public function index()
    {
        $eventos = Evento::where('fecha', '>=', now()->toDateString())->orderBy('fecha')->get();
        return view('eventos.index', compact('eventos'));
    }

    // Mostrar detalle de un evento
    public function show(Evento $evento)
    {
        return view('eventos.show', compact('evento'));
    }

    public function inscribirse(Evento $evento)
    {
        $user = auth()->user();
    
        if ($user->is_admin) {
            abort(403, 'Solo los alumnos pueden inscribirse.');
        }
    
        if ($evento->usuarios->contains($user->id)) {
            return back()->with('error', 'Ya estás inscrito en este evento.');
        }
    
        $evento->usuarios()->attach($user->id);
    
        return back()->with('success', 'Te has inscrito correctamente.');
    }
    
    public function cancelarInscripcion(Evento $evento)
    {
        $user = auth()->user();
    
        if (! $evento->usuarios->contains($user->id)) {
            return back()->with('error', 'No estás inscrito en este evento.');
        }
    
        $evento->usuarios()->detach($user->id);
    
        return back()->with('success', 'Has cancelado tu inscripción correctamente.');
    }
    

}

