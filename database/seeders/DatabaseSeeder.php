<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\incidencia;
use App\Models\subcategoria;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        $this->call(categoriaSeeder::class);
        $this->call(incidenciaSeeder::class);
        $this->call(usuarioSeeder::class);
        $this->call(subcategoriaSeeder::class);


    }
}
