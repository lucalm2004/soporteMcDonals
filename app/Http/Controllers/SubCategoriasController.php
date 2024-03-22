<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class SubCategoriasController extends Controller
{
    public function index()
    {

        if(isset($_POST['selectedValue'])){
            $id = $_POST["selectedValue"];
            if($id == 'Hardware'){
                $subcategorias = DB::table('subcategorias as sub')
                ->join('categorias as cat', 'sub.ID_Categoria', '=', 'cat.ID_Categoria')
                ->select('sub.*', 'cat.Nombre_Categoria as categoria')
                ->orderBy('sub.ID_Categoria', 'desc')
                ->get();
                return response()->json($subcategorias);

            }else{
                $subcategorias = DB::table('subcategorias as sub')
            ->join('categorias as cat', 'sub.ID_Categoria', '=', 'cat.ID_Categoria')
            ->select('sub.*', 'cat.Nombre_Categoria as categoria')
            ->get();

return response()->json($subcategorias);
            }
            
        }else{
            $subcategorias = DB::table('subcategorias as sub')
            ->join('categorias as cat', 'sub.ID_Categoria', '=', 'cat.ID_Categoria')
            ->select('sub.*', 'cat.Nombre_Categoria as categoria')
            ->get();

return response()->json($subcategorias);
        }
        
    }
}
