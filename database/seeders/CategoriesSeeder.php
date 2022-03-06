<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('categories')->insert([

            ['name' => 'Notebook'],
            ['name' => 'Computador'],
            ['name' => 'Sala de Aula'],
            ['name' => 'Laboratório'],
            ['name' => 'Auditório'],
            ['name' => 'Motocicleta'],
            ['name' => 'Carro'],
            ['name' => 'Sala de Reunião'],
            ['name' => 'Audiovisual'],
            ['name' => 'Periféricos']

        ]);
    }
}
