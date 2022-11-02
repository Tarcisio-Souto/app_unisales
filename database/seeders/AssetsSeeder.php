<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AssetsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('assets')->insert([

            ['id' => 1, 'name' => 'Notebook',
             'patrimony_number' => '00001',
             'fk_category' => '1',
             'fk_instituition' => '1',
             'fk_model' => '1',
             'status' => '1'
            ],

            ['id' => 2, 'name' => 'Notebook',
             'patrimony_number' => '00002',
             'fk_category' => '1',
             'fk_instituition' => '1',
             'fk_model' => '1',
             'status' => '1'
            ],

            ['id' => 3, 'name' => 'Notebook',
             'patrimony_number' => '00003',
             'fk_category' => '1',
             'fk_instituition' => '1',
             'fk_model' => '1',
             'status' => '1'
            ],

            ['id' => 4, 'name' => 'Notebook',
             'patrimony_number' => '00004',
             'fk_category' => '1',
             'fk_instituition' => '1',
             'fk_model' => '1',
             'status' => '1'
            ],

            ['id' => 5, 'name' => 'Notebook',
             'patrimony_number' => '00005',
             'fk_category' => '1',
             'fk_instituition' => '1',
             'fk_model' => '1',
             'status' => '1'
            ],

            ['id' => 6, 'name' => 'Notebook',
             'patrimony_number' => '00006',
             'fk_category' => '1',
             'fk_instituition' => '1',
             'fk_model' => '1',
             'status' => '1'
            ],

            ['id' => 7, 'name' => 'Notebook',
             'patrimony_number' => '00007',
             'fk_category' => '1',
             'fk_instituition' => '1',
             'fk_model' => '1',
             'status' => '1'
            ],

            ['id' => 8, 'name' => 'Notebook',
             'patrimony_number' => '00008',
             'fk_category' => '1',
             'fk_instituition' => '1',
             'fk_model' => '2',
             'status' => '1'
            ],

            ['id' => 9, 'name' => 'Notebook',
             'patrimony_number' => '00009',
             'fk_category' => '1',
             'fk_instituition' => '1',
             'fk_model' => '2',
             'status' => '1'
            ],

            ['id' => 10, 'name' => 'Sala de Aula 126A',
             'patrimony_number' => '0',
             'fk_category' => '3',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 11, 'name' => 'Sala de Aula 126B',
             'patrimony_number' => '0',
             'fk_category' => '3',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 12, 'name' => 'Sala de Aula 329',
             'patrimony_number' => '0',
             'fk_category' => '3',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 13, 'name' => 'Sala de Aula 240',
             'patrimony_number' => '0',
             'fk_category' => '3',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 14, 'name' => 'Sala de Aula 222',
             'patrimony_number' => '0',
             'fk_category' => '3',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 15, 'name' => 'Sala de Aula 312',
             'patrimony_number' => '0',
             'fk_category' => '3',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 16, 'name' => 'Laboratório de Informática 1',
             'patrimony_number' => '0',
             'fk_category' => '4',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 17, 'name' => 'Laboratório de Informática 2',
             'patrimony_number' => '0',
             'fk_category' => '4',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 18, 'name' => 'Laboratório de Informática 3',
             'patrimony_number' => '0',
             'fk_category' => '4',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 19, 'name' => 'Sala de Reunião 1',
             'patrimony_number' => '0',
             'fk_category' => '8',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 20, 'name' => 'Sala de Reunião 2',
             'patrimony_number' => '0',
             'fk_category' => '8',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 21, 'name' => 'Auditório',
             'patrimony_number' => '0',
             'fk_category' => '5',
             'fk_instituition' => '1',
             'fk_model' => '8',
             'status' => '1'
            ],

            ['id' => 22, 'name' => 'Projetor',
             'patrimony_number' => '00010',
             'fk_category' => '9',
             'fk_instituition' => '1',
             'fk_model' => '3',
             'status' => '1'
            ],

            ['id' => 23, 'name' => 'Projetor',
             'patrimony_number' => '00011',
             'fk_category' => '9',
             'fk_instituition' => '1',
             'fk_model' => '3',
             'status' => '1'
            ],

            ['id' => 24, 'name' => 'Projetor',
             'patrimony_number' => '00012',
             'fk_category' => '9',
             'fk_instituition' => '1',
             'fk_model' => '4',
             'status' => '1'
            ],

            ['id' => 25, 'name' => 'Impressora',
             'patrimony_number' => '00013',
             'fk_category' => '10',
             'fk_instituition' => '1',
             'fk_model' => '5',
             'status' => '1'
            ],

            ['id' => 26, 'name' => 'Impressora',
             'patrimony_number' => '00014',
             'fk_category' => '10',
             'fk_instituition' => '1',
             'fk_model' => '6',
             'status' => '1'
            ],

            ['id' => 27, 'name' => 'Impressora',
             'patrimony_number' => '00015',
             'fk_category' => '10',
             'fk_instituition' => '1',
             'fk_model' => '7',
             'status' => '1'
            ],

            ['id' => 28, 'name' => 'Impressora',
             'patrimony_number' => '00016',
             'fk_category' => '10',
             'fk_instituition' => '1',
             'fk_model' => '7',
             'status' => '1'
            ],

            ['id' => 29, 'name' => 'Impressora',
             'patrimony_number' => '00016',
             'fk_category' => '10',
             'fk_instituition' => '1',
             'fk_model' => '7',
             'status' => '1'
            ]


        ]);
    }
}
