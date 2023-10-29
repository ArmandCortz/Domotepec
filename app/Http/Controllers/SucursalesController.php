<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empresa;
use App\Models\Sucursal;

class SucursalesController extends Controller
{
    public function index()
    {
        $empresas = Empresa::all();
        $sucursales = Sucursal::all();
        return view('administracion.modules.sucursales.index', compact('sucursales', 'empresas'));
    }

    public function create()
    { 
        $empresas = Empresa::all();
        $sucursales = Sucursal::all();
        return view('administracion.modules.sucursales.create', compact('sucursales', 'empresas'));
    }

    public function store(Request $request)
    {
        Sucursal::create($request->all());

        return redirect()->route('sucursales.index')->with('success', 'Sucursal creada exitosamente.');

    }

    public function show($id)
    {
        //
    }

    public function edit(Sucursal $sucursales, $id)
    {
        $sucursal = Sucursal::find($id);
        $empresas = Empresa::all();


        // Mostrar la vista de edición con la sucursal
        return view('administracion.modules.sucursales.edit', compact('sucursal','empresas'));
    }

    public function update(Request $request, $id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->update($request->all());

        return redirect()->route('sucursales.index')->with('success', 'Sucursal actualizada exitosamente.');

    }

    public function destroy($id)
    {
        $sucursal = Sucursal::find($id);
        $sucursal->delete();
        return redirect()->route('sucursales.index')->with('error', 'Sucursal eliminada exitosamente.');
    }
}