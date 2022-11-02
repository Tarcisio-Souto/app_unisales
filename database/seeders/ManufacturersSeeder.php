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

            ['id' => 1, 'name' => 'Positivo'],
            ['id' => 2, 'name' => 'Dell'],
            ['id' => 3, 'name' => 'Lenovo'],
            ['id' => 4, 'name' => 'Acer'],
            ['id' => 5, 'name' => 'Samsung'],
            ['id' => 6, 'name' => 'Asus'],
            ['id' => 7, 'name' => 'HP'],
            ['id' => 8, 'name' => 'Semp Toshiba'],
            ['id' => 9, 'name' => 'LG'],
            ['id' => 10, 'name' => 'Apple'],
            ['id' => 11, 'name' => 'AGFA'],
            ['id' => 12, 'name' => 'Epson'],
            ['id' => 13, 'name' => 'NEC Corporation'],
            ['id' => 14, 'name' => 'Brother Industries'],
            ['id' => 15, 'name' => 'Kodak'],
            ['id' => 16, 'name' => 'Kyocera'],
            ['id' => 17, 'name' => 'Canon'],
            ['id' => 18, 'name' => 'Centronics'],
            ['id' => 19, 'name' => 'Lexmark'],
            ['id' => 20, 'name' => 'Xerox'],
            ['id' => 21, 'name' => 'Indefinido']       

        ]);
    }
}
