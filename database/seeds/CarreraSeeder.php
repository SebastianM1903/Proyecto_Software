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
            'nombre' => 'Ingenieria Civil',
        ]);
        DB::table('carreras')->insert([
            'codigo' => 'ICO',
            'nombre' => 'Ingenieria en Construcción',
        ]);
        DB::table('carreras')->insert([
            'codigo' => 'INF',
            'nombre' => 'Ingenieria Civil Informatica',
        ]);
        DB::table('carreras')->insert([
            'codigo' => 'PGB - T',
            'nombre' => 'Pedagogía en Educación General Básica con Mención - Talca',
        ]);
        DB::table('carreras')->insert([
            'codigo' => 'PGB - C',
            'nombre' => 'Pedagogía en Educación General Básica con Mención - Curicó',
        ]);        
        DB::table('carreras')->insert([
            'codigo' => 'PIN',
            'nombre' => 'Pedagogía en Inglés',
        ]);       
        DB::table('carreras')->insert([
            'codigo' => 'MED',
            'nombre' => 'Medicina',
        ]);       
        DB::table('carreras')->insert([
            'codigo' => 'ENF - T',
            'nombre' => 'Enfermeria - Talca',
        ]);       
        DB::table('carreras')->insert([
            'codigo' => 'ENF - C',
            'nombre' => 'Enfermeria - Curicó',
        ]);     
        DB::table('carreras')->insert([
            'codigo' => 'PMC',
            'nombre' => 'Pedagogía en Matemáticas y Computación',
        ]);
        DB::table('carreras')->insert([
            'codigo' => 'EFI',
            'nombre' => 'Educacion Fisica',
        ]);
        DB::table('carreras')->insert([
            'codigo' => 'LCC',
            'nombre' => 'Pedagogía en Lengua Castellana y Comunicación',
        ]);
    }
}
