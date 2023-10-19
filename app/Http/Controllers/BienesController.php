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
    { // Mostrar una lista de todas las sucursales

        $bienes = Bienes::all();
        $sucursales = Sucursal::all();
        $empresas = Empresa::all();

        return view('administracion.modules.bienes.index', compact('bienes', 'sucursales', 'empresas'));
    }

    public function create()
    {
        $sucursales = Sucursal::all();
        $bienes = Bienes::all();
        $empresas = Empresa::all();

        return view("administracion.modules.bienes.create", compact("bienes", 'sucursales','empresas'));
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }
    public function edit(Bienes $bienes)
    {
        $sucursales = Sucursal::all();
        $bienes = Bienes::find($bienes->id);
        $empresas = Empresa::all();
        return view("administracion.modules.bienes.edit", compact("bienes", 'sucursales','empresas'));

    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}