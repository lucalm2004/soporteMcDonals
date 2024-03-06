<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class usuarioSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
       // Crear usuarios clientes
       DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Cliente1',
        'Correo_Electronico' => 'cliente1@example.com',
        'Contrasena' => bcrypt('cliente123'),
        'Rol' => 'cliente',
        'Sede' => 'Barcelona'
    ]);

    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Cliente2',
        'Correo_Electronico' => 'cliente2@example.com',
        'Contrasena' => bcrypt('cliente456'),
        'Rol' => 'cliente',
        'Sede' => 'Berlín'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Admin1',
        'Correo_Electronico' => 'admin1@example.com',
        'Contrasena' => bcrypt('admin123'),
        'Rol' => 'admin',
        'Sede' => 'Barcelona'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Admin2',
        'Correo_Electronico' => 'admin2@example.com',
        'Contrasena' => bcrypt('admin456'),
        'Rol' => 'admin',
        'Sede' => 'Montreal'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Gestor1',
        'Correo_Electronico' => 'gestor1@example.com',
        'Contrasena' => bcrypt('gestor123'),
        'Rol' => 'gestor',
        'Sede' => 'Barcelona'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Gestor2',
        'Correo_Electronico' => 'gestor2@example.com',
        'Contrasena' => bcrypt('gestor456'),
        'Rol' => 'gestor',
        'Sede' => 'Berlín'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Tecnico1',
        'Correo_Electronico' => 'tecnico1@example.com',
        'Contrasena' => bcrypt('tecnico123'),
        'Rol' => 'tecnico',
        'Sede' => 'Montreal'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Tecnico2',
        'Correo_Electronico' => 'tecnico2@example.com',
        'Contrasena' => bcrypt('tecnico456'),
        'Rol' => 'tecnico',
        'Sede' => 'Barcelona'
    ]);
    }
}
