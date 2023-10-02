<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal; // Asegúrate de importar el modelo de Sucursal

class SucursalesController extends Controller

{
    public function index()
    {
        // Mostrar una lista de todas las sucursales
        $sucursales = Sucursal::all();
        return view('administracion.modules.sucursales.index', compact('sucursales'));
    }


    public function show($id)
    {
        // Mostrar información detallada de una sucursal específica
        $sucursal = Sucursal::findOrFail($id);
        return view('sucursales.show', compact('sucursal'));
    }
    
    public function store(Request $request)
    {
        $request->validate([
            'direccion' => 'required',
            'nombre' => 'required',
            'telefono' => 'required',
            'empresa' => 'required',
            'gerente' => 'required',
           
        ]);
        $data = $request->all();

        Sucursal::create($data);

        return redirect()->route('sucursales.index')->with('success', 'Usuario creado exitosamente.');
    }

    // Puedes agregar más métodos según tus necesidades, como create, edit, update, destroy, etc.
}
