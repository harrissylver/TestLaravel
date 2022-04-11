<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->jobTitle(),
            'price' => $this->faker->numberBetween($min = 1000, $max = 9000),
            'quantity' => $this->faker->numberBetween($min = 5, $max = 20),
            'description' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'images' => '["images/laptop-2.jpg","images/laptop-3.jpg","images/laptop-4.jpg"]',
        ];
    }
}
