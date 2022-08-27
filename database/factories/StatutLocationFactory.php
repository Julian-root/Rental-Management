<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class StatutLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */

    protected $model = StatutLocation::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->,
        ];
    }
}
