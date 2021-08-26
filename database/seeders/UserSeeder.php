<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        User::create([
            'name' => 'vadick',
            'email' => 'vadick@vadick.com',
            'password' => bcrypt('12345678')
        ])->assignRole('admin');

        User::create([
            'name' => 'Alais Alvarado',
            'email' => 'alais@alais.com',
            'password' => bcrypt('12345678')
        ])->assignRole('medico');

        User::create([
            'name' => 'Juanita',
            'email' => 'juanita@juanita.com',
            'password' => bcrypt('12345678')
        ])->assignRole('secretaria');
    }
}
