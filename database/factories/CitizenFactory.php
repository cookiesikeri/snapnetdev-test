<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Citizen>
 */
class CitizenFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'fullname' => fake()->firstName() . " " . fake()->lastName(),
            'ward_id' => fake()->randomDigit(),
            'gender' => rand(0, 1),
            'address' => fake()->streetAddress(),
            'phone' => fake()->phoneNumber()
        ];
    }
}
