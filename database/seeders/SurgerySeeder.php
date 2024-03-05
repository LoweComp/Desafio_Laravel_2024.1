<?php

namespace Database\Seeders;

use App\Models\Surgery;
use App\Models\Specialty;
use App\Models\Patient;
use App\Models\HealthPlan;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SurgerySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialty = Specialty::find(3);
        $value = $specialty->value;

        // Dias
        $nextMonday = Carbon::now()->addWeek()->addDays(1);

        $nextTuesday = Carbon::now()->addWeek()->addDays(2);

        $nextWednesday = Carbon::now()->addWeek()->addDays(3);

        // Horarios

        $firstTime = Carbon::createFromTime(6, 0, 0);

        $midTime = Carbon::createFromTime(8, 0, 0);

        $finalTime = Carbon::createFromTime(10, 0, 0);


        // Cálculo do desconto
        $patientId = 4;
        $patient = Patient::find($patientId);
        $finalValue = $value * (1 - $patient->healthplan->discount);

        Surgery::create([
            'start' => $nextMonday->copy()->setTimeFrom($firstTime),
            'value' => $finalValue,
            'patient_id' => 4,
            'doctor_id' => 10,
            'specialty_id' => 3,
        ]);

        Surgery::create([
            'start' => $nextTuesday->copy()->setTimeFrom($midTime),
            'value' => $finalValue,
            'patient_id' => 4,
            'doctor_id' => 10,
            'specialty_id' => 3,
        ]);

        Surgery::create([
            'start' => $nextWednesday->copy()->setTimeFrom($finalTime),
            'value' => $finalValue,
            'patient_id' => 4,
            'doctor_id' => 10,
            'specialty_id' => 3,
        ]);
    }
    // !Populei os pacientes 3 e 4 & Doutores 3 e 10 com consultas (cirurgias)
}
