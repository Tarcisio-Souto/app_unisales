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
        \App\Models\Instituitions::factory()->create();
        $this->call(DepartmentsSeeder::class);
        $this->call(SectorsSeeder::class);
        $this->call(CategoriesSeeder::class);
        $this->call(ManufacturersSeeder::class);
        $this->call(ModelsSeeder::class);
        $this->call(AssetsSeeder::class);
        $this->call(RacesSeeder::class);
        \App\Models\User::factory()->create();
        $this->call(LoansSeeder::class);

    }
}
