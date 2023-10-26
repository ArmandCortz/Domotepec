<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contacto;

class ContactoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contactos = Contacto::all(); // Reemplaza Contacto con el nombre de tu modelo 
    
        return view('administracion.vistas.contacto.index', compact('contactos'));
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
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
    public function eliminarTodos(Request $request)
    {
        // Lógica para eliminar todos los contactos
        Contacto::truncate();  // Elimina todos los registros de la tabla

        return response()->json(['message' => 'Todos los contactos han sido eliminados correctamente.']);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
