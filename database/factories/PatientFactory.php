<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [

            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'),
            'remember_token' => Str::random(10),
            'birth_date' => fake()->dateTimeThisCentury(),
            'address' => fake()->address(),
            'phone' => fake()->numberBetween(),
            'cpf' => fake()->numberBetween(),
            'blood_type' => fake()->randomElement(['A', 'B', 'AB', 'O']),
            'photo' => '',
            'health_plan_id' => fake()->randomElement(['1', '2', '3'])

        ];
    }
}
