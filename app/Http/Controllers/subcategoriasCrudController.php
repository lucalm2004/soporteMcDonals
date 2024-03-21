<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subcategoria;


class subcategoriasCrudController extends Controller
{
    public function index()
    {
        $incidencias = subcategoria::all();
        return view('subcategorias.index', compact('incidencias'));
    }
}
