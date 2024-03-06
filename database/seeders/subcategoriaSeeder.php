<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class subcategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
     public function run()
    {
        DB::table('subcategorias')->insert([
            'Nombre_Subcategoria' => 'Aplicació gestió administrativa',
            'ID_Categoria' => 1,
        ]);

        // Crear subcategorías utilizando el modelo Subcategoria
        DB::table('subcategorias')->insert([
            'Nombre_Subcategoria' => 'Accés remot',
            'ID_Categoria' => 1,
        ]);

        DB::table('subcategorias')->insert([
            'Nombre_Subcategoria' => 'Aplicació de videoconferència',
            'ID_Categoria' => 1,
        ]);

        DB::table('subcategorias')->insert([
            'Nombre_Subcategoria' => 'Imatge de projector defectuosa (Software)',
            'ID_Categoria' => 1,
        ]);

        DB::table('subcategorias')->insert([
            'Nombre_Subcategoria' => 'Problema amb el teclat',
            'ID_Categoria' => 2,
        ]);

        DB::table('subcategorias')->insert([
            'Nombre_Subcategoria' => 'El ratolí no funciona',
            'ID_Categoria' => 2,
        ]);

        DB::table('subcategorias')->insert([
            'Nombre_Subcategoria' => 'Monitor no s\'encén',
            'ID_Categoria' => 2,
        ]);

        DB::table('subcategorias')->insert([
            'Nombre_Subcategoria' => 'Imatge de projector defectuosa (Hardware)',
            'ID_Categoria' => 2,
        ]);
    }
}
