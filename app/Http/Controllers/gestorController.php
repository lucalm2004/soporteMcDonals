<?php

namespace App\Http\Controllers;

use App\Models\Incidencia;
use App\Models\Usuario;

use Illuminate\Http\Request;

class GestorController extends Controller
{
    public function index(Request $request)
    {
        $user = session('usuario');

        // var_dump($request);
        $Sede = $user->Sede;

        $query = Incidencia::select('incidencias.*', 'uc.Nom_Usuario AS Cliente', 'uc.Sede', 'ut.Nom_Usuario AS Tecnico', 'sc.Nombre_Subcategoria AS Subcategoria', 'c.Nombre_Categoria AS Categoria')
            ->join('usuarios as uc', 'uc.ID_Usuario', '=', 'incidencias.ID_Cliente')
            ->leftJoin('usuarios as ut', 'ut.ID_Usuario', '=', 'incidencias.ID_Tecnico')
            ->join('subcategorias as sc', 'sc.ID_subcategoria', '=', 'incidencias.ID_subcategoria')
            ->join('categorias as c', 'c.ID_Categoria', '=', 'sc.ID_Categoria')
            ->where('uc.Sede', '=', $Sede);


        if ($request->input('tecnico')) {
            $tecnico = $request->input('tecnico');
            $query->where('ut.ID_Usuario', '=', $tecnico);
        }

        if (!$request->input('resolved')) {
            $query->where('Estado', '<>', 'resuelta');
        }

        if ($request->input('orden')) {
            $order = $request->input('orden');

            foreach ($order as $column => $direction) {
                $query->orderBy($column, $direction);
            }
        } else {
            $query->orderBy('Data_Alta', 'DESC');
            $query->orderBy('Prioridad', 'ASC');
        }

        $resultado = $query->get();

        return response()->json($resultado);
    }

    public function select(Request $request)
    {
        $user = session('usuario');

        $tecnicos = Usuario::where('Rol', '=', "tecnico")
            ->where('Sede', '=', $user->Sede)
            ->get();

        return response()->json($tecnicos);
    }

    public function openIncd(Request $request)
    {
        $id = $request->input('idIncidencia');

        $query = Incidencia::select('incidencias.*', 'uc.Nom_Usuario AS Cliente', 'uc.Sede', 'ut.Nom_Usuario AS Tecnico', 'sc.Nombre_Subcategoria AS Subcategoria', 'c.Nombre_Categoria AS Categoria')
            ->join('usuarios as uc', 'uc.ID_Usuario', '=', 'incidencias.ID_Cliente')
            ->leftJoin('usuarios as ut', 'ut.ID_Usuario', '=', 'incidencias.ID_Tecnico')
            ->join('subcategorias as sc', 'sc.ID_subcategoria', '=', 'incidencias.ID_subcategoria')
            ->join('categorias as c', 'c.ID_Categoria', '=', 'sc.ID_Categoria')
            ->where('incidencias.id', '=', $id)
            ->get();

        return response()->json($query);
    }
    public function actualizarGestor(Request $request)
    {
        $idIncidencia = $request->input('idIncidencia');
        $idTecnico = $request->input('idTecnico');

        $resultado = Incidencia::find($idIncidencia);

        $resultado->ID_Tecnico = $idTecnico;

        $resultado->save();
    }
}
