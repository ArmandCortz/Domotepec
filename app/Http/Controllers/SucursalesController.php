<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sucursal; // Asegúrate de importar el modelo de Sucursal

class SucursalesController extends Controller

{
    public $sucursal;
    public function index()
    {
        // Mostrar una lista de todas las sucursales
        $sucursales = Sucursal::all();
        return view('administracion.modules.sucursales.index', compact('sucursales'));
    }

    public function show($id)
    {
        // Obtener la sucursal por su ID
        $sucursal = Sucursal::findOrFail($id);
        $sucursal->delete();

        return redirect()->route('sucursales.index')->with('success', 'Usuario eliminado exitosamente.');
    }
    public function edit($id)
{
    // Obtener la sucursal por su ID
    $sucursal = Sucursal::findOrFail($id);

    // Mostrar la vista de edición con la sucursal
    return view('administracion.modules.sucursales.index', compact('sucursal'));
}

 
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'empresa' => 'required|string|max:100',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:20',
            'gerente' => 'required|string|max:100',
            // Asegúrate de que los nombres de los campos coincidan con los de tu formulario
        ]);

        Sucursal::create($request->all());

        return redirect()->route('sucursales.index')->with('success', 'Sucursal creada exitosamente.');
    }
    // Puedes agregar más métodos según tus necesidades, como create, edit, update, destroy, etc.
    public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:100',
        'empresa' => 'required|string|max:100',
        'direccion' => 'required|string|max:255',
        'telefono' => 'required|string|max:20',
        'gerente' => 'required|string|max:100',
        // Asegúrate de que los nombres de los campos coincidan con los de tu formulario
    ]);

    $sucursal = Sucursal::findOrFail($id);
    $sucursal->update($request->all());

    return redirect()->route('sucursales.index')->with('success', 'Sucursal actualizada exitosamente.');
}

}
