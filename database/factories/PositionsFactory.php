<?php

namespace Database\Factories;

use App\Models\Positions;
use Illuminate\Database\Eloquent\Factories\Factory;

class PositionsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Positions::class;


    public function definition()
    {
        return [true];
    }
}
