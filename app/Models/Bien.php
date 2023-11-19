<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bien extends Model
{
    use HasFactory;
    protected $table = "bienes";
    protected $fillable = [
        'nombre',
        'costo',
        'descripcion',
        'sucursal',
        'empresa',
        'stock',
        'estado',
        'imagen',
    ];
}