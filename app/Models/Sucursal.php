<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $table = 'sucursal'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'nombre',
        'empresa',
        'direccion',
        'telefono',
        'gerente',
        'imagen',
        // Puedes agregar más campos aquí si es necesario
    ];

}