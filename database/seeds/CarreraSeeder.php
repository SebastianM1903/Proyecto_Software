<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CarreraSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('carreras')->insert([
            'codigo' => 'ICI',
            'nombre' => 'Ingenieria Civil Informatica',
        ]);
        DB::table('carreras')->insert([
            'codigo' => 'EFI',
            'nombre' => 'Educacion Fisica',
        ]);
    }
}
