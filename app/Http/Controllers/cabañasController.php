<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabaña; // Asegúrate de importar el modelo de Sucursal

class cabañasController extends Controller
{
    public $cabañas;
    public function index()
    {
        // Mostrar una lista de todas las sucursales
        $cabañas = Cabaña::all();
        return view('administracion.modules.cabañas.index', compact('cabañas'));

    }
   
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:100',
            'ubicacion' => 'required|string|max:100',
            'sucursal' => 'required|integer',
            'descripcion' => 'nullable|string',
            // Puedes agregar más reglas de validación según tus necesidades
        ]);

        Cabaña::create([
            'nombre' => $request->input('nombre'),
            'ubicacion' => $request->input('ubicacion'),
            'sucursal' => $request->input('sucursal'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('cabañas.index')->with('success', 'Cabaña creada exitosamente.');
    }
    public function destroy($id)
{
    // Obtener la cabaña por su ID y eliminarla
    $cabaña = Cabaña::findOrFail($id);
    $cabaña->delete();

    return redirect()->route('cabañas.index')->with('success', 'Cabaña eliminada exitosamente.');
}

 

    public function edit($id)
    {
        // Obtener la cabaña por su ID
        $cabañas = Cabaña::findOrFail($id);

        return view('administracion.modules.cabañas.modalShowCabañas', compact('cabañas'));
    }
    // Puedes agregar más métodos según tus necesidades, como create, edit, update, destroy, etc.

    public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'ubicacion' => 'required|string|max:255',
        'sucursal' => 'required',
        'descripcion' => 'nullable|string',
        // Asegúrate de que los nombres de los campos coincidan con los de tu formulario
    ]);

    $cabañas = Cabaña::findOrFail($id);
    $cabañas->update($request->all());

    return redirect()->route('cabañas.index')->with('success', 'Cabaña actualizada exitosamente.');
}
}
