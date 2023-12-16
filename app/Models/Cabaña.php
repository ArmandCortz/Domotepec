<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabana extends Model
{
    use HasFactory;

    protected $fillable = [
        'imagen',
        'nombre',
        'ubicacion',
        'descripcion',
        'sucursal',
        'precio',
        'huespedes',
        'habitaciones',
        'camas',
        'baños',
        'limpieza',
    ];

    public function sucursal()
    {
        return $this->belongsTo(Sucursal::class, 'sucursal');
    }
    public function imagenes()
    {
        return $this->hasMany(Imagenes::class, 'cabana');
    }
    public function servicios()
    {
        return $this->belongsToMany(Servicios::class, 'cabanas_has_servicios', 'cabana', 'servicio');
    }
}