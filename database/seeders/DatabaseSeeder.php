<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        // utilizar a notação abaixo para insert via seed:
        $this->call(StatesSeeder::class);
        
        \App\Models\Addresses::factory()->create();
        $this->call(PositionsSeeder::class);

    }
}
