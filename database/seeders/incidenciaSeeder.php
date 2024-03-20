<?php

namespace Database\Seeders;

use DateTime;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class IncidenciaSeeder extends Seeder
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
            'Prioridad' => 'alta',
            'Comentario_Cliente' => 'PAM PAM',
            'ID_subcategoria' => '1',
        ]);
        DB::table('incidencias')->insert([
            'ID_Cliente' => '1',
            'Data_Alta' =>  new \DateTime(),
            'Estado' => 'sin_asignar',
            'Prioridad' => 'media',
            'Comentario_Cliente' => 'PAM PAM',
            'ID_subcategoria' => '2',
        ]);
        DB::table('incidencias')->insert([
            'ID_Cliente' => '1',
            'Data_Alta' =>  new \DateTime(),
            'Estado' => 'sin_asignar',
            'Prioridad' => 'baja',
            'Comentario_Cliente' => 'PAM PAM',
            'ID_subcategoria' => '3',
        ]);
        DB::table('incidencias')->insert([
            'ID_Cliente' => '1',
            'Data_Alta' =>  new \DateTime(),
            'Estado' => 'sin_asignar',
            'Prioridad' => 'media',
            'Comentario_Cliente' => 'PAM PAM',
            'ID_subcategoria' => '4',
        ]);
        DB::table('incidencias')->insert([
            'ID_Cliente' => '1',
            'Data_Alta' =>  new \DateTime(),
            'Estado' => 'sin_asignar',
            'Prioridad' => 'alta',
            'Comentario_Cliente' => 'PAM PAM',
            'ID_subcategoria' => '5',
        ]);
        DB::table('incidencias')->insert([
            'ID_Cliente' => '1',
            'Data_Alta' =>  new \DateTime(),
            'Estado' => 'sin_asignar',
            'Prioridad' => 'media',
            'Comentario_Cliente' => 'PAM PAM',
            'ID_subcategoria' => '6',
        ]);
    }
}
