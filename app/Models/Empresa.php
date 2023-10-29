<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;
    protected $table = 'empresas'; // Nombre de la tabla en la base de datos

    protected $fillable = [
        'id',
        'nombre',
        'imagen',
        // Puedes agregar más campos aquí si es necesario
    ];
    

}