<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SectorsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('sectors')->insert([

            ['fk_department' => '1', 'name' => 'Administração'],
            ['fk_department' => '1', 'name' => 'Arquitetura e Urbanismo'],
            ['fk_department' => '1', 'name' => 'Biomedicina'],
            ['fk_department' => '1', 'name' => 'Ciências Biológicas - Bacharelado'],
            ['fk_department' => '1', 'name' => 'Ciências Contábeis'],
            ['fk_department' => '1', 'name' => 'Direito'],
            ['fk_department' => '1', 'name' => 'Educação Física - Bacharelado'],
            ['fk_department' => '1', 'name' => 'Educação Física - Licenciatura'],
            ['fk_department' => '1', 'name' => 'Enfermagem'],
            ['fk_department' => '1', 'name' => 'Engenharia Civil'],
            ['fk_department' => '1', 'name' => 'Engenharia de Produção'],
            ['fk_department' => '1', 'name' => 'Engenharia de Software'],
            ['fk_department' => '1', 'name' => 'Farmácia'],
            ['fk_department' => '1', 'name' => 'Filosofia'],
            ['fk_department' => '1', 'name' => 'Fisioterapia'],
            ['fk_department' => '1', 'name' => 'Nutrição'],
            ['fk_department' => '1', 'name' => 'Psicologia'],
            ['fk_department' => '1', 'name' => 'Sistemas de Informação'],
            ['fk_department' => '1', 'name' => 'Tecnologia em Análise e Desenvolvimento de Sistemas']
        

        ]);
    }
}
