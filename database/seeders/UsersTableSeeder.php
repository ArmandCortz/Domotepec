<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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

        
    }
}