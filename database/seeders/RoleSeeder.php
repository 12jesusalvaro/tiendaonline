<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Vendedor']);
        $role4 = Role::create(['name' => 'User']);

        Permission::create(['name' => 'dashboard'])->syncRoles([$role1,$role2,$role3]);
        Permission::create(['name' => 'productos'])->syncRoles([$role1,$role2]);
        Permission::create(['name' => 'admin.users.index'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.index'])->syncRoles([$role1]);

    }
}
