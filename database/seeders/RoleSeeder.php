<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('roles')->insert([
            'nombre' => 'admin',
            'display_nombre' => 'Administrador del sitio web',
            'descripcion' => 'Encargado de administrar el sitio web'
        ]);

        DB::table('roles')->insert([
            'nombre' => 'medico',
            'display_nombre' => 'Medico de la clinica',
            'descripcion' => 'Encargado de brindar atención médica'
        ]);

        DB::table('roles')->insert([
            'nombre' => 'secretaria',
            'display_nombre' => 'Secretaria de la clinica',
            'descripcion' => 'Encargado de secretaría'
        ]);
    }
}
