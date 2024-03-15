<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class IncidenciaCrudController extends Controller
{
    public function index()
    {
        $incidencias = Incidencia::all();
        return view('incidencias.index', compact('incidencias'));
    }

    // Otros métodos como create, store, show, edit, update, destroy pueden ser implementados según sea necesario
}
