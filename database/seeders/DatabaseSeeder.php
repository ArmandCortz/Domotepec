<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(RoleSeeder::class);
        $this->call(UsersTableSeeder::class);
        // $this->call(EmpresaSeeder::class);
        // $this->call(ServiciosSeeder::class);
        // $this->call(SucursalesSeeder::class);
        // $this->call(CabañasSeeder::class);
        // $this->call(BienesSeeder::class);
        // $this->call(CHSSeeder::class);
        // $this->call(ReservasSeeder::class);
    }
}