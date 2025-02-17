<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Propiedad extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'agente_id',
        'categoria_id',
    ];

    // Relación con Agente
    public function agente()
    {
        return $this->belongsTo(Agente::class);
    }

    // Relación con Categoria
    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }
}
