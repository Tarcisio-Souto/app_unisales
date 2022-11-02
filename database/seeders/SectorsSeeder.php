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

            ['id' => 1, 'fk_department' => '1', 'name' => 'Administração'],
            ['id' => 2, 'fk_department' => '1', 'name' => 'Arquitetura e Urbanismo'],
            ['id' => 3, 'fk_department' => '1', 'name' => 'Biomedicina'],
            ['id' => 4, 'fk_department' => '1', 'name' => 'Ciências Biológicas - Bacharelado'],
            ['id' => 5, 'fk_department' => '1', 'name' => 'Ciências Contábeis'],
            ['id' => 6, 'fk_department' => '1', 'name' => 'Direito'],
            ['id' => 7, 'fk_department' => '1', 'name' => 'Educação Física - Bacharelado'],
            ['id' => 8, 'fk_department' => '1', 'name' => 'Educação Física - Licenciatura'],
            ['id' => 9, 'fk_department' => '1', 'name' => 'Enfermagem'],
            ['id' => 10, 'fk_department' => '1', 'name' => 'Engenharia Civil'],
            ['id' => 11, 'fk_department' => '1', 'name' => 'Engenharia de Produção'],
            ['id' => 12, 'fk_department' => '1', 'name' => 'Engenharia de Software'],
            ['id' => 13, 'fk_department' => '1', 'name' => 'Farmácia'],
            ['id' => 15, 'fk_department' => '1', 'name' => 'Filosofia'],
            ['id' => 16, 'fk_department' => '1', 'name' => 'Fisioterapia'],
            ['id' => 17, 'fk_department' => '1', 'name' => 'Nutrição'],
            ['id' => 18, 'fk_department' => '1', 'name' => 'Psicologia'],
            ['id' => 19, 'fk_department' => '1', 'name' => 'Sistemas de Informação'],
            ['id' => 20, 'fk_department' => '1', 'name' => 'Tecnologia em Análise e Desenvolvimento de Sistemas']
        

        ]);
    }
}
