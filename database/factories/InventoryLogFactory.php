<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InventoryLog>
 */
class InventoryLogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "quantity_changed" => fake()->numberBetween(-100, 100),
            "type" => fake()->randomElement(["add", "remove"]),
            "isRead" => false,
            "product_id" => Product::factory()
        ];
    }
}
