<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;


class PerfilController extends Controller
{
    public function index()
    {
        $user = User::find(Auth::user()->id);
        $role = Role::find(Auth::user()->id);

        return view('auth.perfil', compact('user', 'role'));
    }

    public function update(Request $request, User $user)
    {
        $messages = [
            'name.required' => 'El campo usuario es obligatorio.',
            'name.unique' => 'El nombre ya está en uso por otro usuario.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'El correo electrónico ya está en uso por otro usuario.',
        ];

        // Validación de los campos 'name' y 'email'
        $request->validate([
            
        ], $messages);

        // Actualizar los campos del usuario con los datos proporcionados en la solicitud
        $user->update($request->only(['name', 'email', 'nombres', 'apellidos', 'dui', 'telefono']));

        // Redirigir al usuario a la ruta 'perfil' con un mensaje de éxito
        return redirect()->route('Perfil.index')->with('success', 'Perfil actualizado exitosamente.');
    }


    public function updatePassword(Request $request, User $user)
    {
        $messages = [
            'current-password.required' => 'El campo de contraseña actual es obligatorio.',
            'new-password.required' => 'El campo de nueva contraseña es obligatorio.',
            'new-password.min' => 'La nueva contraseña debe tener al menos :min caracteres.',

            'new-password.same' => 'El campo de nueva contraseña debe coincidir con la confirmación.',

            'new-password_confirm.required' => 'El campo de confirmación de nueva contraseña es obligatorio.',
            'new-password_confirm.same' => 'El campo de confirmación debe coincidir con la nueva contraseña.',

        ];

        $request->validate([
            'current-password' => 'required',
            'new-password' => 'required||same:new-password_confirm|min:8',
            'new-password_confirm' => 'required|same:new-password|min:8',

        ], $messages);

        if (Hash::check($request->input('current-password'), $user->password)) {
            $user->update(['password' => Hash::make($request->input('new-password'))]);
            return redirect()->route('perfil')->with('success', 'Contraseña actualizada exitosamente.');
        } else {
            return redirect()->route('perfil')->with('error', 'La contraseña actual es incorrecta.');
        }
    }

}