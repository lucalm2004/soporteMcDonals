<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;


class categoriasCrudController extends Controller
{
    public function index()
    {
        $incidencias = categoria::all();
        return view('categorias.index', compact('incidencias'));
    }
}
