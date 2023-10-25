<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bienes;
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
            'costo.required' => 'El campo costo es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
        ];
        $request->validate([
            'nombre' => 'required',
            'costo' => 'required',
            'empresa' => 'required',
            'sucursal' => 'required',
            'estado' => 'required',
            'stock' => 'required|integer',
            'descripcion' => 'required',
        ], $messages);

        Bienes::create($request->all());
                // dd($request->estado);

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

    public function update(Request $request,  $id)
    {
        
        
        $bien = Bienes::find($id);
        // dd($bien);
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'costo.required' => 'El campo costo es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
        ];
        $request->validate([
            'nombre' => 'required',
            'costo' => 'required|numeric',
            'empresa' => 'required',
            'sucursal' => 'required',
            'estado' => 'required',
            'stock' => 'required|integer',
            'descripcion' => 'required',
        ], $messages);


        $bien->update($request->all());

        return redirect()->route('bienes.index')->with('info', 'Bien actualizado exitosamente.');
    }

    public function destroy(Bienes $bien, $id)
    {
        $bien = Bienes::find($id);

        if (!$bien) {
            return redirect()->route('bienes.index')->with('error', 'El bien no se encontró.');
        }

        $bien->delete();

        return redirect()->route('bienes.index')->with('error', 'Bien eliminado exitosamente.');

    }
}