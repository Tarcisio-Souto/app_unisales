<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('departments')->insert([

            ['name' => 'Coordenadoria de Cursos', 'fk_instituition' => '1'],
            ['name' => 'Tecnologia da Informação', 'fk_instituition' => '1'],
            ['name' => 'Administrativo', 'fk_instituition' => '1'],
            ['name' => 'Recursos Humanos', 'fk_instituition' => '1'],
            ['name' => 'Comercial', 'fk_instituition' => '1'],
            ['name' => 'Financeiro', 'fk_instituition' => '1'],
            ['name' => 'Marketing', 'fk_instituition' => '1'],
            ['name' => 'Jurídico', 'fk_instituition' => '1'],
            ['name' => 'Operacional', 'fk_instituition' => '1'],
            ['name' => 'Diretoria', 'fk_instituition' => '1'],
            ['name' => 'Ouvidoria', 'fk_instituition' => '1'],
            ['name' => 'Biblioteca', 'fk_instituition' => '1'],
            ['name' => 'Secretaria Acadêmica', 'fk_instituition' => '1'],           

        ]);
    }
}
