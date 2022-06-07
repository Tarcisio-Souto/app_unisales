<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {

        $key = '!@#$';

        return [
            'name' => 'Tarcisio Souto',
            'email' => 'tss.labsi@gmail.com',
            'age' => '29',
            'cpf' => '101.101.101-10', // password
            'remember_token' => Str::random(100),
            'dt_birth' => '1993-02-26',
            'dt_adm' => '2021-09-13',
            'fk_address' => '1',
            'fk_department' => '2',
            'fk_sector' => '18',
            'fk_instituition' => '1',
            'fk_position' => '5',
            'genre' => 'm',
            'password' => Hash::make($key),
            'path_photo' => '',
            'phone_number' => '(10) 10101-1010',
            'fk_race' => '3',
            'registration' => '6919100993',
            'status' => '0'
        ];
    }

}
