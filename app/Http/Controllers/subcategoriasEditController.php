<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\subcategoria;
use Illuminate\Support\Facades\DB;


class subcategoriasEditController extends Controller
{
    public function index(Request $request)
    {
        if (isset($_POST['id'])) {
            $id = $_POST['id'];
            $nombreCategoria = subcategoria::where('ID_subcategoria', $id)->value('Nombre_Subcategoria');
            return response()->json($nombreCategoria);
        } elseif (isset($_POST['subcategoria'])) {
            $ids = $_POST['ide'];
            $update = $_POST['subcategoria'];
            $tipo = $_POST['tipo'];

            DB::table('subcategorias')
            ->where('ID_subcategoria', $ids)
            ->update([
                'Nombre_Subcategoria' => $update,
                'ID_Categoria' => $tipo
            ]);
        

            return response()->json(['success' => true, 'message' => 'Registro actualizado exitosamente']);
        } elseif (isset($_POST['eliminar'])) {
            $ide = $_POST['eliminar'];
            DB::table('subcategorias')
                ->where('ID_subcategoria', $ide)
                ->delete();
        }
    }
}
