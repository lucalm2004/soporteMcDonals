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
            'ID_Cliente' => '2',
            'Data_Alta' =>  new \DateTime(),
            'Estado' => 'sin_asignar',
            'Prioridad' => 'media',
            'Comentario_Cliente' => 'PAM PAM',
            'ID_subcategoria' => '2',
        ]);

        DB::table('incidencias')->insert([
            'ID_Cliente' => '9',
            'Data_Alta' =>  new \DateTime(),
            'Estado' => 'sin_asignar',
            'Prioridad' => 'baja',
            'Comentario_Cliente' => 'Algo algo',
            'ID_subcategoria' => '4',
        ]);
    }
}
