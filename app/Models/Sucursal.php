<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sucursal extends Model
{
    use HasFactory;
    protected $table = "sucursal";
    protected $fillable = [
        'nombre',
        'nombre',
        'empresa',
        'direccion',
        'telefono',
        'gerente',
        'imagen',
        // Puedes agregar más campos aquí si es necesario
    ];
    public function cabañas()
    {
        return $this->hasMany(Cabaña::class, 'sucursal');
    }
}