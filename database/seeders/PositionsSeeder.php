<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Positions;
use Illuminate\Support\Facades\DB;

class PositionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */

    protected $model = Positions::class;

    public function run()
    {
        Positions::insert([
            ['name' => 'Coordenador'],
            ['name' => 'Professor'],
            ['name' => 'Técnico Em Informática'],
            ['name' => 'Estagiário'],
            ['name' => 'Aluno'],
        ]);

        /*
        DB::table('positions')->insert([
            ['name' => 'Coordenador'],
            ['name' => 'Professor'],
            ['name' => 'Técnico Em Informática'],
            ['name' => 'Estagiário'],
            ['name' => 'Aluno'],
        ]);
        */
    }
}
