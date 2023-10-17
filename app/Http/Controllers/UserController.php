<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserController extends Controller
{
    public function __construct(){
        $this->middleware('can:users.index')->only('index');
        $this->middleware('can:users.create')->only('create');
        $this->middleware('can:users.edit')->only('edit');
    }
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
        // $user->load('permissions'); // Cargar los permisos del usuario
        $user = User::find($user->id);

        $permisos = Permission::all();
        return view('administracion.modules.users.role', compact('user', 'roles', 'permisos'));
    }



    public function update(Request $request, User $user)
    {
        // dd($request->roles);
        // dd($user->all());
        $request->validate([
            'name-' . $user->id => 'required',
            'email-' . $user->id => 'required|email|unique:users,email,' . $user->id,
        ]);

        $user->update([
            'name' => $request->input('name-' . $user->id),
            'email' => $request->input('email-' . $user->id),
        ]);

        $user->roles()->sync($request->roles);

        // $user->permissions()->sync($request->permisos);
        $user->syncPermissions($request->permisos);

        return redirect()->route('users.index')->with('info', 'Usuario actualizado exitosamente.');
    }

    public function destroy(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')->with('error', 'Usuario eliminado exitosamente.');
    }
}