<?php

namespace App\Http\Controllers;

use App\Mail\AvisaPaciente;
use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class EmailController extends Controller
{
    /**
     * Send email to all patients.
     */
    public function send(Request $request)
    {
        $subject = $request->input('subject');
        $body = $request->input('body');

        // Retrieve all patients
        $patients = Patient::all();

        // Send email to each patient
        foreach ($patients as $patient) {
            Mail::to($patient->email)->send(new AvisaPaciente($subject, $body));
        }

        return redirect()->back()->with('success', 'E-mail enviado para todos os pacientes com sucesso.');
    }
}

