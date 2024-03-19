<?php
// database/factories/BasketFactory.php

namespace Database\Factories;

use App\Models\Basket;
use App\Models\User;
use App\Models\CarPart;
use Illuminate\Database\Eloquent\Factories\Factory;

class BasketFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Basket::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::inRandomOrder()->first()->id,
            'car_part_id' => CarPart::inRandomOrder()->first()->id,
            'quantity' => $this->faker->numberBetween(1, 5),
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}
