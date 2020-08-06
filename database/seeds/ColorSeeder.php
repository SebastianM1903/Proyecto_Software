<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('colors')->insert([
            'codigo' => 'blue',
            'nombre' => 'Azul',
        ]);

        DB::table('colors')->insert([
            'codigo' => 'green',
            'nombre' => 'Verde',
        ]);

        DB::table('colors')->insert([
            'codigo' => 'red',
            'nombre' => 'Rojo',
        ]);

        DB::table('colors')->insert([
            'codigo' => 'yellow',
            'nombre' => 'Amarillo',
        ]);

        DB::table('colors')->insert([
            'codigo' => 'black',
            'nombre' => 'Negro',
        ]);
    }
}
