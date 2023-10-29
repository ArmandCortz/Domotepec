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
        $messages = [
            'name.required' => 'El campo de usuario es obligatorio.',
            'name.unique' => 'El usuario ya está en uso por otro usuario.',
            'email.required' => 'El campo de correo electrónico es obligatorio.',
            'email.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email.unique' => 'El correo electrónico ya está en uso por otro usuario.',
            'password.required' => 'El campo de contraseña es obligatorio.',
            'password.confirmed' => 'El campo de contraseña debe coincidir con el campo de confirmación de contraseña.',
            'password.min' => 'La contraseña debe tener al menos 8 caracteres.',
            'password_confirmation.required' => 'El campo de confirmación de contraseña es obligatorio.',
            'password_confirmation.same' => 'El campo de confirmación de contraseña debe coincidir con la contraseña.',
            'password_confirmation.min' => 'La confirmacion de contraseña debe tener al menos 8 caracteres.',
        ];
        // dd($request);
        $request->validate([
            'name' => 'required|unique:users,name,',
            'email' => 'required|email|unique:users',
            'password' => [
                'required',
                'confirmed',
                'min:8',
                // Password::min(8) //cantidad de caracteres
                //         ->letters() //almenos una letra
                //         ->mixedCase() //almenos una letra minuscula y una mayuscula
                //         ->numbers() //almenos un numero
                //         ->symbols() //almenos un simbolo
            ],
            'password_confirmation' => 'required|same:password|min:8',
        ], $messages);

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
        return view('administracion.modules.users.edit', compact('user', 'roles', 'permisos'));
    }



    public function update(Request $request, User $user)
    {
        
        // dd($request->roles);
        // dd($user->all());
        $messages = [
            'name-' . $user->id . '.required' => 'El campo de nombre es obligatorio.',
            'name-' . $user->id . '.unique' => 'El nombre ya está en uso por otro usuario.',
            'email-' . $user->id . '.required' => 'El campo de correo electrónico es obligatorio.',
            'email-' . $user->id . '.email' => 'El correo electrónico debe ser una dirección de correo válida.',
            'email-' . $user->id . '.unique' => 'El correo electrónico ya está en uso por otro usuario.',
        ];
        $request->validate([
            'name-' . $user->id => 'required|unique:users,name,' . $user->id,
            'email-' . $user->id => 'required|email|unique:users,email,' . $user->id,
        ], $messages);

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