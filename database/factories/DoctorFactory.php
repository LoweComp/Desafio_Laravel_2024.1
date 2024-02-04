<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\User;

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
    {/*
        $estates = ['Acre', 'Alagoas', 'Amapá', 'Amazonas', 'Bahia', 'Ceará', 'EspíritO Santo', 'Goiás', 'Maranhão',
            'Mato Grosso', 'Mato Grosso do Sul', 'Minas Gerais', 'Pará', 'Paraíba', 'Paraná', 'Pernambuco',
            'Piauí', 'Rio de Janeiro', 'Rio Grande do Norte', 'Rio Grande do Sul', 'Rondônia', 'Roraima',
            'Santa Catarina', 'São Paulo', 'Sergipe', 'Tocantins', 'Distrito Federal'];

        $user = factory(App\Models\User::class)->create([
            'user_type' => 'doctor',
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'remember_token' => Str::random(10),
            'birth_date' => fake()->dateTimeThisCentury(),
            'zip_code' => fake()->postcode(),
            'street' => fake()->streetName(),
            'estate' => fake()->randomElement($estates),
            'city' => fake()->city(),
            'number' => fake()->randomNumber(4, false),
            'complement' => fake()->word(),
            'phone' => fake()->numberBetween(),
            'cpf' => fake()->numberBetween(),
        ]);
        */
        return [
            //'user_id' => $user->id,
            //'working_period',
            //'CRM',
            //'specialty_id'
        ];
    }
}
