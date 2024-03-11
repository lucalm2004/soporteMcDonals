<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class incidenciaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('incidencias')->insert([
            'ID_Cliente' => '1',
            'Data_Alta' =>  new \DateTime(),
            'Estado' => 'sin_asignar',
            'Prioridad' => 'media',
            'Comentario_Cliente' => 'Pasa algo, arreglen',
            'ID_subcategoria' => '2',
            'ID_Cliente' => '1',
        ]);
    }
}
