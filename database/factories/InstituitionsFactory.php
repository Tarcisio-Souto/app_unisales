<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class InstituitionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'cnpj' => '82.617.182/0001-09',
            'email' => 'instituto@instituto.org',
            'fantasy_name' => 'Instituto Fantasia',
            'social_name' => 'Fantasia Instituto',
            'phone_number' => '(01) 0101-0101',
            'status' => '1',
            'fk_address' => '1'
        ];
    }
}
