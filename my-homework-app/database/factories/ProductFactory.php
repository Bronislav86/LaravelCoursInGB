<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sku' => $this->faker->unique()->numberBetween(1000, 9999),
            'name' => $this->faker->sentence(3),
            'price' => $this->faker->randomFloat(3, 0.1, 999999.999),
        ];
    }
}
