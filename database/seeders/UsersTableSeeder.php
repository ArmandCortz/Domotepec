<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([

            'name' => 'administrador',
            'email' => 'admin@admin.com',
            'password' => Hash::make('adminadmin'),
            'nombres' => 'Leonel Armando',
            'apellidos' => 'Garcia Cortez',
            'dui' => '059240267',
            'telefono' => '50360043157',

        ])->assignRole("SuperAdministrador");

        User::create([
            'name' => 'Leonel',
            'email' => 'armand1515.lc@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");

        User::create([
            'name' => 'Victor',
            'email' => 'victor@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Cliente");

        User::create([
            'name' => 'Javier',
            'email' => 'javier@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");

        User::create([
            'name' => 'Stanley',
            'email' => 'stanley@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");
        
        User::create([
            'name' => 'Jonathan',
            'email' => 'jonathan@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");

        User::create([
            'name' => 'Oscar',
            'email' => 'oscar@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");

        User::create([
            'name' => 'Nathaly',
            'email' => 'nathaly@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");

        User::create([
            'name' => 'Rosemary',
            'email' => 'rosemary@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");

        User::create([
            'name' => 'Enrique',
            'email' => 'enrique@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");

        User::create([
            'name' => 'Daniel',
            'email' => 'daniel@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");

        User::create([
            'name' => 'Andres',
            'email' => 'andres@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");

        User::create([
            'name' => 'Raul',
            'email' => 'raul@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");

        User::create([
            'name' => 'Armando',
            'email' => 'armando@gmail.com',
            'password' => Hash::make('adminadmin')
        ])->assignRole("Administrador");
    }
}