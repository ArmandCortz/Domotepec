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
    $cabaña = cabañas::findOrFail($id);
    $cabaña->delete();

<<<<<<< HEAD
    return redirect()->route('cabañas.index')->with('success', 'Cabaña eliminada exitosamente.');
}
=======
        // Obtener todas las cabañas
        $cabañas = Cabaña::findOrFail($id);
>>>>>>> 6f111f94ea227f79697cd9b5057e32b9b3fc8ddf

 

    public function edit($id)
    {
        // Obtener la cabaña por su ID
        $cabañas = Cabaña::findOrFail($id);

        return view('administracion.modules.cabañas.modalShowCabañas', compact('cabañas'));
    }
    // Puedes agregar más métodos según tus necesidades, como create, edit, update, destroy, etc.
<<<<<<< HEAD

    public function update(Request $request, $id)
{
    $request->validate([
        'nombre' => 'required|string|max:255',
        'ubicacion' => 'required|string|max:255',
        'sucursal' => 'required',
        'descripcion' => 'nullable|string',
        // Asegúrate de que los nombres de los campos coincidan con los de tu formulario
    ]);

    $cabañas = cabañas::findOrFail($id);
    $cabañas->update($request->all());

    return redirect()->route('sucursales.index')->with('success', 'Sucursal actualizada exitosamente.');
}
}
=======
}
>>>>>>> 6f111f94ea227f79697cd9b5057e32b9b3fc8ddf
