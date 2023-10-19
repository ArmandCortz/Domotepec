<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class PerfilController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        return view('auth.perfil', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        // $user=( [
        //     'name'=> $request->input('name-' . $request->id),
        //     'email'=> $request->input('email'),
        //     "nombres"=> $request->input("nombres"),
        //     "apellidos" => $request->input("apellidos"),
        //     "dui" => $request->input("dui"),
        //     "telefono" => $request->input("telefono"),
        // ] );

        // dd( $user );
        // dd($request->all());
        $messages = [
            'name.required' => 'El campo de nombre es obligatorio.',
            'name.unique' => 'El nombre ya está en uso por otro usuario.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'El correo electrónico ya está en uso por otro usuario.',
        ];

        $request->validate([
            'name' => 'required|unique:users,name,' . $request->id,
            'email' => 'required|email|unique:users,email,' . $request->id,
        ], $messages);
        
        $user->update([
            
                'name' => $request->input('name-' . $request->id),
                'email' => $request->input('email'),
                "nombres" => $request->input("nombres"),
                "apellidos" => $request->input("apellidos"),
                "dui" => $request->input("dui"),
                "telefono" => $request->input("telefono"),
            
        ]);
        
        return redirect()->route('perfil')->with('info', 'Usuario actualizado exitosamente.');
    }

}