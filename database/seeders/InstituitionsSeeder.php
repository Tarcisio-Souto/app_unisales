<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Instituitions;

class InstituitionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Instituitions::factory()->create();
    }
}
