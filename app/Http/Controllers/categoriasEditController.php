<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categoria;
use App\Models\subcategoria;
use Illuminate\Support\Facades\DB;



class categoriasEditController extends Controller
{
    public function index(Request $request)
{
    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $nombreCategoria = categoria::where('ID_Categoria', $id)->value('Nombre_Categoria');
        return response()->json($nombreCategoria);
    }elseif(isset($_POST['categoria'])){
        $ids = $_POST['ide'];
        $update = $_POST['categoria'];        

DB::table('categorias')
    ->where('ID_Categoria', $ids)
    ->update(['Nombre_Categoria' => $update]);

            return response()->json(['success' => true, 'message' => 'Registro actualizado exitosamente']);
        }elseif(isset($_POST['eliminar'])){
            $ide = $_POST['eliminar'];
            DB::table('subcategorias')
            ->where('ID_Categoria', $ide)
            ->delete();

            DB::table('categorias')
            ->where('ID_Categoria', $ide)
            ->delete();
        } elseif(isset($_POST['ver'])){
           $id = $_POST['ver'];
           $subcategoriasConCategoria = DB::table('subcategorias')
           ->leftJoin('categorias', 'subcategorias.ID_Categoria', '=', 'categorias.ID_Categoria')
           ->select('subcategorias.*', 'categorias.Nombre_Categoria')
           ->where('categorias.ID_Categoria', $id)
           ->get();
           return response()->json($subcategoriasConCategoria);

        }
    }
}

