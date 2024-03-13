<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incidencia extends Model
{
    use HasFactory;

    protected $table = 'incidencias'; // Especificamos el nombre de la tabla

    protected $primaryKey = 'id'; // Definimos la clave primaria

    protected $fillable = [
        'ID_Cliente',
        'ID_Tecnico',
        'Data_Alta',
        'Data_Resolucion',
        'Estado',
        'Prioridad',
        'Comentario_Cliente',
        'Comentario_Tecnico',
        'ID_subcategoria',
    ];

    // Relación con la tabla Usuarios para el cliente
    public function cliente()
    {
        return $this->belongsTo(User::class, 'ID_Cliente');
    }

    // Relación con la tabla Usuarios para el técnico
    public function tecnico()
    {
        return $this->belongsTo(User::class, 'ID_Tecnico');
    }

    // Relación con la tabla Subcategorias
    public function subcategoria()
    {
        return $this->belongsTo(Subcategoria::class, 'ID_subcategoria');
    }
}
