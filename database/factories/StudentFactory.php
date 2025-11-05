<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;
use App\Models\City;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nom' => $this->faker->name(),
            'adresse' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'date_naissance' => $this->faker->date(),
            'city_id' => City::factory(),
        ];
    }
}
