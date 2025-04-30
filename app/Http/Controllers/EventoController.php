<?php

namespace App\Http\Controllers;

use App\Models\Evento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
}
