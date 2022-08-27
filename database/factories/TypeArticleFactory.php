<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\TypeArticle;


class TypeArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */

    protected $model = TypeArticle::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
        ];
    }
}
