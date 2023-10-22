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
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'costo.required' => 'El campo costo es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
        ];
        $request->validate([
            'nombre' => 'required',
            'sucursal' => 'required',
            'costo' => 'required',
            'empresa' => 'required',
            'descripcion' => 'required',
        ], $messages);
        
        Bienes::create([
            'nombre' => $request->input('nombre'),
            'sucursal' => $request->input('sucursal'),
            'costo' => $request->input('costo'),
            'empresa' => $request->input('empresa'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('bienes.index')->with('success', 'Bien creado exitosamente.');
    }

    public function show($id)
    {
        //
    }
    public function edit(Bienes $bienes,$id)
    {
        $sucursales = Sucursal::all();
        $bien = Bienes::find($id);
        $empresas = Empresa::all();
        return view("administracion.modules.bienes.edit", compact("bien", 'sucursales','empresas'));

    }

    public function update(Request $request, $id)
    {
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'costo.required' => 'El campo costo es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
        ];
        $request->validate([
            'nombre' => 'required',
            'sucursal' => 'required',
            'costo' => 'required',
            'empresa' => 'required',
            'descripcion' => 'required',
        ], $messages);

        $bienes = Bienes::find($id);
        $bienes->update($request->all());

        return redirect()->route('bienes.index')->with('success', 'Bien actualizado exitosamente.');
    }

    public function destroy(Bienes $bien, $id)
    {
        $bien = Bienes::find($id);

        if (!$bien) {
            return redirect()->route('bienes.index')->with('error', 'El bien no se encontró.');
        }

        $bien->delete();

        return redirect()->route('bienes.index')->with('info', 'Bien eliminado exitosamente.');

    }
}