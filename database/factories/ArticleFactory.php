<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Article;

class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @var string
     */

    protected $model = Article::class;
    
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->lastName,
            'noSerie' => $this->faker->swiftBicNumber,
            'imageUrl' => $this->faker->imageUrl(),
            "type_article_id"=> rand(1, 5),
            'estDisponible' => rand(0, 1)
        ];
    }
}
