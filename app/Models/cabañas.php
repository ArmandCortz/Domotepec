<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cabañas extends Model
{
    protected $table = 'cabana';

    protected $fillable = [
        'nombre', 'ubicacion', 'sucursal' , 'descripcion'
    ];

    // Relación con la sucursal
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal');
    }
}
