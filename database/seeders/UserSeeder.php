<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {

        $estates = ['Acre',
            'Alagoas',
            'Amapá',
            'Amazonas',
            'Bahia',
            'Ceará',
            'EspíritO Santo',
            'Goiás',
            'Maranhão',
            'Mato Grosso',
            'Mato Grosso do Sul',
            'Minas Gerais',
            'Pará',
            'Paraíba',
            'Paraná',
            'Pernambuco',
            'Piauí',
            'Rio de Janeiro',
            'Rio Grande do Norte',
            'Rio Grande do Sul',
            'Rondônia',
            'Roraima',
            'Santa Catarina',
            'São Paulo',
            'Sergipe',
            'Tocantins',
            'Distrito Federal'];

        User::create([
            'name' => 'Ronaldo',
            'email' => 'adm@hospital.com.br',
            'email_verified_at' => now(),
            'password' => Hash::make('12345678'), // password
            'remember_token' => Str::random(10),
            'birth_date' => fake()->date('Y-m-d'),
            'zip_code' => fake()->postcode(),
            'estate' => fake()->randomElement($estates),
            'city' => fake()->city(),
            'street' => fake()->streetName(),
            'number' => fake()->randomNumber(4, false),
            'complement' => 'ap 401',
            'phone' => fake()->numberBetween(),
            'cpf' => '08612771200',
            'user_type' => 'adm'
        ]);

        //User::factory()->count(50)->create();

    }


}
