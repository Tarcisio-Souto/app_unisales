<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ModelsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('models')->insert([

            ['id' => 1, 'name' => 'Aspire', 'fk_manufacturer' => '4'],
            ['id' => 2, 'name' => 'IdeaPad 3', 'fk_manufacturer' => '3'],
            ['id' => 3, 'name' => 'PowerLite', 'fk_manufacturer' => '12'],
            ['id' => 4, 'name' => 'X1123H', 'fk_manufacturer' => '4'],
            ['id' => 5, 'name' => 'Mono A4 MS811DN', 'fk_manufacturer' => '19'],
            ['id' => 6, 'name' => 'Laser Mono M408DN A4', 'fk_manufacturer' => '7'],
            ['id' => 7, 'name' => 'ColorWorks C3500', 'fk_manufacturer' => '12'],
            ['id' => 8, 'name' => 'Indefinido', 'fk_manufacturer' => '21']

        ]);
    }
}
