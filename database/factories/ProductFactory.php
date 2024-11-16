<?php

namespace Database\Factories;

use App\Models\Supplier;
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
    public function definition(): array
    {
        return [
            "name" => fake()->word,
            "sku" => fake()->unique()->slug,
            "stock" => fake()->numberBetween(0, 100),
            "price" => fake()->numberBetween(0, 100),
            "supplier_id" => Supplier::factory()
        ];
    }
}
