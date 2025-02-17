<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agente extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'email',
    ];
}
