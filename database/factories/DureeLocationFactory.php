<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class DureeLocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */

    protected $model = DureeLocation::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'libelle' => $this->faker->,
            'valeurEnHeure' =>
        ];
    }
}
