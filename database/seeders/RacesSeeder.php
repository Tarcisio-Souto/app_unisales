<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RacesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('races')->insert([

            ['id' => 1, 'name' => 'Parda'],
            ['id' => 2, 'name' => 'Branca'],
            ['id' => 3, 'name' => 'Preta'],
            ['id' => 4, 'name' => 'Amarela'],
            ['id' => 5, 'name' => 'Indígena'],
            ['id' => 6, 'name' => 'Não declarado']

        ]);
    }
}
