<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $role1 = Role::create(['name' => 'admin']);
        $role2 = Role::create(['name' => 'medico']);
        $role3 = Role::create(['name' => 'secretaria']);

        Permission::create(['name' => 'users.index', 'display_name' => 'mostrar usuarios'])->syncRoles($role1);
        Permission::create(['name' => 'users.create', 'display_name' => 'crear nuevo usuario'])->syncRoles($role1);
        Permission::create(['name' => 'users.edit', 'display_name' => 'editar usuario'])->syncRoles($role1);
        Permission::create(['name' => 'users.destroy', 'display_name' => 'eliminar usuario'])->syncRoles($role1);

        Permission::create(['name' => 'pacientes.index', 'display_name' => 'mostrar pacientes'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'pacientes.create', 'display_name' => 'crear nuevo paciente'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'pacientes.edit', 'display_name' => 'editar paciente'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'pacientes.destroy', 'display_name' => 'eliminar paciente'])->syncRoles([$role1, $role2]);
    }
}
