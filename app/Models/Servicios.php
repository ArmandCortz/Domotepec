<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicios extends Model
{
    use HasFactory;

    protected $table = 'servicio'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'estado',
        'costo',
        'descripcion',
        'sucursal',
        'empresa',
        'stock',
        // Puedes agregar más campos aquí si es necesario
    ];
}