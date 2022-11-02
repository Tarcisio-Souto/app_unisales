<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LoansSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('loans')->insert([

            ['id' => 1, 'dt_loan' => '2022-02-07',
             'dt_devolution' => '2022-02-07',
             'fk_asset' => '1',
             'fk_user' => '1',
             'status' => '0',
             //'alert' => '1',
             'comments' => ''
            ],

            ['id' => 2, 'dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-09',
             'fk_asset' => '8',
             'fk_user' => '1',
             'status' => '0',
             //'alert' => '0',
             'comments' => ''
            ],
            
            ['id' => 3, 'dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '13',
             'fk_user' => '1',
             'status' => '0',
             //'alert' => '0',
             'comments' => ''
            ],

            ['id' => 4, 'dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '17',
             'fk_user' => '1',
             'status' => '0',
             //'alert' => '0',
             'comments' => ''
            ],

            ['id' => 5, 'dt_loan' => '2022-01-10',
             'dt_devolution' => '2022-01-11',
             'fk_asset' => '5',
             'fk_user' => '1',
             'status' => '0',
             //'alert' => '1',
             'comments' => ''
            ],

            ['id' => 6, 'dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '20',
             'fk_user' => '1',
             'status' => '0',
             //'alert' => '0',
             'comments' => ''
            ],

            ['id' => 7, 'dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '1',
             'fk_user' => '1',
             'status' => '0',
             //'alert' => '0',
             'comments' => ''
            ],

            ['id' => 8, 'dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '23',
             'fk_user' => '1',
             'status' => '0',
             //'alert' => '0',
             'comments' => ''
            ],

            ['id' => 9, 'dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '24',
             'fk_user' => '1',
             'status' => '0',
             //'alert' => '0',
             'comments' => ''
            ]

        ]);
    }
}
