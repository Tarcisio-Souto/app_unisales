<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ManufacturersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('manufacturers')->insert([

            ['name' => 'Positivo'],
            ['name' => 'Dell'],
            ['name' => 'Lenovo'],
            ['name' => 'Acer'],
            ['name' => 'Samsung'],
            ['name' => 'Asus'],
            ['name' => 'HP'],
            ['name' => 'Semp Toshiba'],
            ['name' => 'LG'],
            ['name' => 'Apple'],
            ['name' => 'AGFA'],
            ['name' => 'Epson'],
            ['name' => 'NEC Corporation'],
            ['name' => 'Brother Industries'],
            ['name' => 'Kodak'],
            ['name' => 'Kyocera'],
            ['name' => 'Canon'],
            ['name' => 'Centronics'],
            ['name' => 'Lexmark'],
            ['name' => 'Xerox'],
            ['name' => 'Indefinido']       

        ]);
    }
}
