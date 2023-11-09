<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal;

class HomeuserController extends Controller
{
    
    public function index()
    {
        // Obtén todas las sucursales desde el modelo
        $sucursales = Sucursal::all();

        // Pasa las sucursales a la vista
        return view('users.home')->with('sucursales', $sucursales);
    }
    
}
