<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CarPart>
 */
class CarPartFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=> fake()->sentence,
            'description'=>fake()->paragraph,
            'car_model'=>fake()->sentence,
            'car_brand'=>fake()->randomElement(['Toyota','Honda', 'Ford', 'Chevrolet', 'Volkswagen', 'Nissan', 'BMW', 'Mercedes-Benz', 'Audi', 'Hyundai', 'Kia', 'Subaru', 'Jeep', 'Tesla', 'Lexus', 'Mazda', 'Volvo', 'Porsche', 'Ferrari', 'Mitsubishi']),
            'price'=>fake()->randomNumber(3),
            'point_price'=>fake()->word,
            'usage_level'=>fake()->randomElement(['New', 'Like New', 'Good', 'Fair', 'Poor']),
            'car_part_image'=>fake()->imageUrl,
            'created_at'=>now(),
            'updated_at'=>now(),

        ];
    }
}
