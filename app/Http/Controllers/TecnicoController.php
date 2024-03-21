<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Incidencia;

class TecnicoController extends Controller
{
    public function index()
    {
        $incidencias = Incidencia::where('ID_Tecnico', 7)
            ->select('Data_Alta', 'Estado', 'Prioridad')
            ->get();
        
        return view('tecnico_home', compact('incidencias'));
    }
    
    
}
