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
        'email' => 'cliente1@example.com',
        'password' => bcrypt('cliente123'),
        'Rol' => 'cliente',
        'Sede' => 'Barcelona'
    ]);

    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Cliente2',
        'email' => 'cliente2@example.com',
        'password' => bcrypt('cliente456'),
        'Rol' => 'cliente',
        'Sede' => 'Berlín'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Admin1',
        'email' => 'admin1@example.com',
        'password' => bcrypt('admin123'),
        'Rol' => 'admin',
        'Sede' => 'Barcelona'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Admin2',
        'email' => 'admin2@example.com',
        'password' => bcrypt('admin456'),
        'Rol' => 'admin',
        'Sede' => 'Montreal'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Gestor1',
        'email' => 'gestor1@example.com',
        'password' => bcrypt('gestor123'),
        'Rol' => 'gestor',
        'Sede' => 'Barcelona'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Gestor2',
        'email' => 'gestor2@example.com',
        'password' => bcrypt('gestor456'),
        'Rol' => 'gestor',
        'Sede' => 'Berlín'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Tecnico1',
        'email' => 'tecnico1@example.com',
        'password' => bcrypt('tecnico123'),
        'Rol' => 'tecnico',
        'Sede' => 'Montreal'
    ]);
    
    DB::table('usuarios')->insert([
        'Nom_Usuario' => 'Tecnico2',
        'email' => 'tecnico2@example.com',
        'password' => bcrypt('tecnico456'),
        'Rol' => 'tecnico',
        'Sede' => 'Barcelona'
    ]);
    }
}
