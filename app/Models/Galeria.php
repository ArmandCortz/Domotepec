<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
// En el archivo del modelo
   protected $table = 'galerias';
    protected $fillable = ['empresa', 'sucursal', 'descripcion','empresa','sucursal', 'ubicacion', 'imagen'];
}


