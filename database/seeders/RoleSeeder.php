<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role1 = Role::create(['name' => 'SuperAdministrador']);
        $role2 = Role::create(['name' => 'Administrador']);
        $role3 = Role::create(['name' => 'Cliente']);

        Permission::create(['name' => 'home'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'perfil'])->syncRoles([$role1, $role2]);
        
        Permission::create(['name' => 'users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'users.destroy'])->syncRoles([$role1]);
        
        Permission::create(['name' => 'sucursales.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'sucursales.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'sucursales.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'sucursales.destroy'])->syncRoles([$role1]);

        Permission::create(['name' => 'cabañas.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'cabañas.create'])->syncRoles([$role1]);
        Permission::create(['name' => 'cabañas.update'])->syncRoles([$role1]);
        Permission::create(['name' => 'cabañas.destroy'])->syncRoles([$role1]);

    }
}