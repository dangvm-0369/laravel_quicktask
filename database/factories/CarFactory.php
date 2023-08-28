<?php

namespace Database\Factories;

use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AppModelsCar>
 */
class CarFactory extends Factory
{
    protected $model = Car::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $cars = ['Toyota', 'Lexus', 'Mitsubishi', 'Hyundai', 'BMV',
            'Mercedes', 'Roll Royce', 'Ferrari', 'Volvo', 'Lamborghini'];
        return [
            'user_id' => rand(1, User::all()->count()),
            'name' => $cars[rand(0, 9)],
            'cost' => fake()->numberBetween(1000, 10000),
        ];
    }
}
