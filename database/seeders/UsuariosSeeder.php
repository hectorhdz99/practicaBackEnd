<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsuariosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'nombre' => 'Carlos Martinez Hernandez',
            'correo' => 'carlos@example.com',
            'fechaNacimiento' => '2003-02-10',
        ]);

        DB::table('usuarios')->insert([
            'nombre' => 'Juan Fernandez Fernandez',
            'correo' => 'juan@example.com',
            'fechaNacimiento' => '1999-05-20',
        ]);

        DB::table('usuarios')->insert([
            'nombre' => 'Jonathan Juarez Gonzales',
            'correo' => 'jonathan@example.com',
            'fechaNacimiento' => '1990-05-15',
        ]);
    }
}
