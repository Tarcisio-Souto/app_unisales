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

            ['id' => 1, 'name' => 'Coordenadoria de Cursos', 'fk_instituition' => '1'],
            ['id' => 2, 'name' => 'Tecnologia da Informação', 'fk_instituition' => '1'],
            ['id' => 3, 'name' => 'Administrativo', 'fk_instituition' => '1'],
            ['id' => 4, 'name' => 'Recursos Humanos', 'fk_instituition' => '1'],
            ['id' => 5, 'name' => 'Comercial', 'fk_instituition' => '1'],
            ['id' => 6, 'name' => 'Financeiro', 'fk_instituition' => '1'],
            ['id' => 7, 'name' => 'Marketing', 'fk_instituition' => '1'],
            ['id' => 8, 'name' => 'Jurídico', 'fk_instituition' => '1'],
            ['id' => 9, 'name' => 'Operacional', 'fk_instituition' => '1'],
            ['id' => 10, 'name' => 'Diretoria', 'fk_instituition' => '1'],
            ['id' => 11, 'name' => 'Ouvidoria', 'fk_instituition' => '1'],
            ['id' => 12, 'name' => 'Biblioteca', 'fk_instituition' => '1'],
            ['id' => 13, 'name' => 'Secretaria Acadêmica', 'fk_instituition' => '1'],           

        ]);
    }
}
