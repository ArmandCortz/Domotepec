<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bienes;
use App\Models\Galeria;
use App\Models\Empresa;
use App\Models\Sucursal;


class BienesController extends Controller
{
    public function index()
    {   // Mostrar una lista de todas las sucursales

        $bienes = Bienes::all();
        $sucursales = Sucursal::all();
        $empresas = Empresa::all();
        
        return view('administracion.modules.bienes.index', compact('bienes','sucursales','empresas'));
    }
}