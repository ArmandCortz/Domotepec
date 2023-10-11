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
                'password' => Hash::make('adminadmin')
            
        ])->assignRole("SuperAdministrador");
        
        User::create([
                'name' => 'Leonel',
                'email' => 'armand1515.lc@gmail.com',
                'password' => Hash::make('adminadmin')
            ])->assignRole("Administrador");
    }
}