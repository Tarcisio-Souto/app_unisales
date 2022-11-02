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

            ['id' => 1, 'name' => 'Notebook'],
            ['id' => 2, 'name' => 'Computador'],
            ['id' => 3, 'name' => 'Sala de Aula'],
            ['id' => 4, 'name' => 'Laboratório'],
            ['id' => 5, 'name' => 'Auditório'],
            ['id' => 6, 'name' => 'Motocicleta'],
            ['id' => 7, 'name' => 'Carro'],
            ['id' => 8, 'name' => 'Sala de Reunião'],
            ['id' => 9, 'name' => 'Audiovisual'],
            ['id' => 10, 'name' => 'Periféricos']

        ]);
    }
}
