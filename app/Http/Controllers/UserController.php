<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('administracion.modules.users.index', compact('users'));
    }

    public function create()
    {
        return view('administracion.modules.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                // Password::min(8) //cantidad de caracteres
                //         ->letters() //almenos una letra
                //         ->mixedCase() //almenos una letra minuscula y una mayuscula
                //         ->numbers() //almenos un numero
                //         ->symbols() //almenos un simbolo
            ],
        ]);
        $data = $request->all();
        $data['password'] = bcrypt($data['password']);

        User::create($data);

        return redirect()->route('users.index')->with('success', 'Usuario creado exitosamente.');
    }

    public function show(User $user)
    {
        return view('administracion.modules.users.show', compact('user'));
    }

    public function edit(User $user)
    {
        $roles = Role::all();
        $permisos = Permission::all();
        return view('administracion.modules.users.role', compact('user','roles','permisos'));
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name-' . $user->id => 'required',
            'email-' . $user->id => 'required|email|unique:users,email,' . $user->id,
        ]);
        // dd($request->all());
        
        $user->update([
            'name' => $request->input('name-' . $user->id),
            'email' => $request->input('email-' . $user->id),
        ]);

        return redirect()->route('users.index')->with('info', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('error', 'Usuario eliminado exitosamente.');
    }
}