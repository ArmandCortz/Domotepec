<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [
                'name' => 'administrador',
                'email' => 'admin@admin.com',
                'password' => Hash::make('adminadmin')
            ],
            [
                'name' => 'Leonel',
                'email' => 'armand1515.lc@gmail.com',
                'password' => Hash::make('adminadmin')
            ],
            // Add more users if needed
        ]);
    }
}