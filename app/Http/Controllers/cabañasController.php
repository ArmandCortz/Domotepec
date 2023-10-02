<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\cabañas; // Asegúrate de importar el modelo de Sucursal

class cabañasController extends Controller
{
    public function index()
    {
        // Mostrar una lista de todas las sucursales
        $cabañas = cabañas::all();
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

        cabañas::create([
            'nombre' => $request->input('nombre'),
            'ubicacion' => $request->input('ubicacion'),
            'sucursal' => $request->input('sucursal'),
            'descripcion' => $request->input('descripcion'),
        ]);

        return redirect()->route('cabañas.index')->with('success', 'Cabaña creada exitosamente.');
    }
    public function show()
    {
        $cabañas = cabañas::all(); // Obtener todas las cabañas

        return view('administracion.modules.cabañas.show', compact('cabañas'));
    }
    // Puedes agregar más métodos según tus necesidades, como create, edit, update, destroy, etc.
}
