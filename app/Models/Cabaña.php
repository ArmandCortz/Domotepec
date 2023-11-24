<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabaña extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'ubicacion',
        'sucursal',
        'descripcion',
        'imagen',
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal');
    }
    public function imagenes()
    {
        return $this->hasMany(Imagenes::class, 'cabaña');
    }
}