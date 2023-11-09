<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabaña extends Model
{
    use HasFactory;

    protected $table = 'cabana';

    protected $fillable = [
        'nombre',
        'ubicacion',
        'sucursal',
        'descripcion',
        'imagen',
    ];

    // Relación con la sucursal
    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal');
    }
    public function imagenes()
    {
        return $this->hasMany(Imagenes::class,'cabaña');
    }
}