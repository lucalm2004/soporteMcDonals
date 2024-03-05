<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id('ID_Categoria');
            $table->string('Nombre_Categoria', 100)->nullable();
            $table->unsignedBigInteger('ID_Subcategoria')->nullable();
            $table->foreign('ID_Subcategoria')->references('ID_Categoria')->on('categorias');
            $table->timestamps();
        });

        Schema::create('usuarios', function (Blueprint $table) {
            $table->id('ID_Usuario');
            $table->string('Nom_Usuario', 100)->nullable();
            $table->string('Correo_Electronico', 100)->nullable();
            $table->string('Contrasena', 100)->nullable();
            $table->enum('Rol', ['admin', 'cliente', 'gestor', 'tecnico'])->nullable();
            $table->enum('Sede', ['Barcelona', 'Berlín', 'Montreal'])->nullable();
            $table->timestamps();
        });

        Schema::create('subcategorias', function (Blueprint $table) {
            $table->id('ID_subcategoria');
            $table->string('Nombre_Subcategoria', 100)->nullable();
            $table->unsignedBigInteger('ID_Categoria')->nullable();
            $table->foreign('ID_Categoria')->references('ID_Categoria')->on('categorias');
            $table->timestamps();
        });

        Schema::create('incidencias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ID_Cliente')->nullable();
            $table->unsignedBigInteger('ID_Tecnico')->nullable();
            $table->date('Data_Alta')->nullable();
            $table->date('Data_Resolucion')->nullable();
            $table->enum('Estado', ['sin_asignar', 'asignada', 'en_trabajo', 'resuelta', 'cerrada'])->nullable();
            $table->enum('Prioridad', ['alta', 'media', 'baja'])->nullable();
            $table->text('Comentario_Cliente')->nullable();
            $table->text('Comentario_Tecnico')->nullable();
            $table->unsignedBigInteger('ID_subcategoria')->nullable();
            $table->foreign('ID_Cliente')->references('ID_Usuario')->on('usuarios');
            $table->foreign('ID_Tecnico')->references('ID_Usuario')->on('usuarios');
            $table->foreign('ID_subcategoria')->references('ID_Subcategoria')->on('subcategorias');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidencias');
        Schema::dropIfExists('subcategorias');
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('categorias');
    }
};
