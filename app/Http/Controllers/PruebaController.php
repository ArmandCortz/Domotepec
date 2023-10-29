<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cabaña;
use App\Models\Sucursal;

class PruebaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cabañas = Cabaña::all();
        $sucursales = Sucursal::all();

        return view("administracion.modules.cabañas.index", compact("cabañas", "sucursales"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cabañas = Cabaña::all();
        $sucursales = Sucursal::all();
        return view("administracion.modules.cabañas.create", compact("cabañas", 'sucursales'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'ubicacion.required' => 'El campo ubicacion es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
        ];
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            // 'empresa' => 'required',
            'sucursal' => 'required',
            // 'estado' => 'required',
            // 'stock' => 'required|integer',
            'descripcion' => 'required',
        ], $messages);

        Cabaña::create($request->all());

        return redirect()->route('cabañas.index')->with('success', 'Cabaña creada exitosamente.');
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
        $sucursales = Sucursal::all();
        $cabaña = Cabaña::find($id);

        return view("administracion.modules.cabañas.edit", compact("sucursales", "cabaña"));
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
        $cabaña = Cabaña::find($id);
        // dd($cabaña);
        $messages = [
            'nombre.required' => 'El campo nombre es obligatorio.',
            'ubicacion.required' => 'El campo ubicacion es obligatorio.',
            'empresa.required' => 'El campo empresa es obligatorio.',
            'sucursal.required' => 'El campo sucursal es obligatorio.',
            'estado.required' => 'El campo estado es obligatorio.',
            'stock.required' => 'El campo stock es obligatorio.',
            'stock.integer' => 'El campo stock debe ser un número entero.',
            'descripcion.required' => 'El campo descripcion es obligatorio.',
        ];
        $request->validate([
            'nombre' => 'required',
            'ubicacion' => 'required',
            // 'empresa' => 'required',
            'sucursal' => 'required',
            // 'estado' => 'required',
            // 'stock' => 'required|integer',
            'descripcion' => 'required',
        ], $messages);

        $cabaña->update($request->all());

        return redirect()->route('cabañas.index')->with('info', 'Cabaña actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cabaña = Cabaña::find($id);

        $cabaña->delete();

        return redirect()->route('cabañas.index')->with('error', 'Cabaña eliminada exitosamente.');
    }
}