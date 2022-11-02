<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AddressesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'street' => 'Av. dos Desenvolvedores',
            'number' => '10',
            'district' => 'Bairro dos Desenvolvedores',
            'complement' => 'Próx. à Microsoft',
            'city' => 'Developers City',
            'zipcode' => '10101-010',
            'fk_state' => '8'
        ];
    }
}
