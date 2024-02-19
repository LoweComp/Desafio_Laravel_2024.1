<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Database\Factories\UserFactory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    public function definition(): array
    {
        $workingPeriods = ['diurno', 'noturno', 'integral'];

        $specialtyIds = ['1', '2', '3'];

        return [

            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // password
            'remember_token' => Str::random(10),
            'birth_date' => fake()->dateTimeThisCentury(),
            'address' => fake()->address(),
            'phone' => fake()->numberBetween(),
            'cpf' => fake()->numberBetween(),
            'photo' => '',
            'working_period' => fake()->randomElement($workingPeriods),
            'CRM' => fake()->unique()->randomNumber(6),
            'specialty_id' => fake()->randomElement($specialtyIds)

        ];
    }
}
