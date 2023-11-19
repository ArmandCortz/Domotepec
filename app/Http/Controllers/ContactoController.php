<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;


class ContactoController extends Controller
{
    public function index()
    {
        $contactos = Contacto::all(); // Reemplaza Contacto con el nombre de tu modelo 

        return view('administracion.vistas.contacto.index', compact('contactos'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validar los datos del formulario
        $request->validate([
            'nombre' => 'required',
            'email' => 'required',
            'telefono' => 'nullable',
            'mensaje' => 'nullable',
        ]);

        // Crear un nuevo contacto con los datos del formulario
        Contacto::create([
            'nombre' => $request->input('nombre'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'mensaje' => $request->input('mensaje'),
        ]);

        // Redireccionar o retornar la respuesta que desees 
        return redirect()->route('Contacto')->with('success', 'Mensaje enviado correctamente');
    }

    public function show($id)
    {
        //
    }
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    public function eliminarTodos(Request $request)
    {
        // Lógica para eliminar todos los contactos
        Contacto::truncate();  // Elimina todos los registros de la tabla

        return response()->json(['message' => 'Todos los contactos han sido eliminados correctamente.']);
    }
}