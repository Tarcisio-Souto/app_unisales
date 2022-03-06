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

            ['dt_loan' => '2022-02-07',
             'dt_devolution' => '2022-02-07',
             'fk_asset' => '1',
             'fk_user' => '1',
             'status' => '0',
             'alert' => '1',
             'observations' => ''
            ],

            ['dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-09',
             'fk_asset' => '8',
             'fk_user' => '1',
             'status' => '0',
             'alert' => '0',
             'observations' => ''
            ],
            
            ['dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '13',
             'fk_user' => '1',
             'status' => '0',
             'alert' => '0',
             'observations' => ''
            ],

            ['dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '17',
             'fk_user' => '1',
             'status' => '0',
             'alert' => '0',
             'observations' => ''
            ],

            ['dt_loan' => '2022-01-10',
             'dt_devolution' => '2022-01-11',
             'fk_asset' => '5',
             'fk_user' => '1',
             'status' => '0',
             'alert' => '1',
             'observations' => ''
            ],

            ['dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '20',
             'fk_user' => '1',
             'status' => '0',
             'alert' => '0',
             'observations' => ''
            ],

            ['dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '1',
             'fk_user' => '1',
             'status' => '0',
             'alert' => '0',
             'observations' => ''
            ],

            ['dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '23',
             'fk_user' => '1',
             'status' => '0',
             'alert' => '0',
             'observations' => ''
            ],

            ['dt_loan' => '2022-03-07',
             'dt_devolution' => '2022-03-07',
             'fk_asset' => '24',
             'fk_user' => '1',
             'status' => '0',
             'alert' => '0',
             'observations' => ''
            ]

        ]);
    }
}
