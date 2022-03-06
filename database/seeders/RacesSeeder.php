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

            ['name' => 'Parda'],
            ['name' => 'Branca'],
            ['name' => 'Preta'],
            ['name' => 'Amarela'],
            ['name' => 'Indígena'],
            ['name' => 'Não declarado']

        ]);
    }
}
