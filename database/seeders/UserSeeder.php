<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Database\Seeder;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $usuario = User::create([
                'name' => 'administrador',
                'tipo_doc' => 'CC',
                'nro_documento' => '1000121',
                'email' => 'admin@gmail.com',
                'Estado' => 'habilitado',
                'password' => bcrypt('admin1234'),
        ])->assignRole('admin');

        $usuario = User::create([
            'name' => 'Usuario',
            'tipo_doc' => 'CC',
            'nro_documento' => '1010100',
            'email' => 'usuario@gmail.com',
            'Estado' => 'habilitado',
            'password' => bcrypt('usuario12'),
        ])->assignRole('Usuario');

    }
}
