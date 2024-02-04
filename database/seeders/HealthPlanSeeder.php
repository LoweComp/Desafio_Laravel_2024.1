<?php

namespace Database\Seeders;

use App\Models\HealthPlan;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HealthPlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HealthPlan::create([
            'name' => 'Cuida+',
            'description' => 'Plano de Saude com melhor custo-benefício',
            'discount' => '0.05'
        ]);

        HealthPlan::create([
            'name' => 'Vida',
            'description' => 'Plano de Saude de quem vive mais',
            'discount' => '0.10'
        ]);

        HealthPlan::create([
            'name' => 'Eternos',
            'description' => 'Plano de saúde do Silvio Santos e cia.',
            'discount' => '0.20'
        ]);

    }
}
