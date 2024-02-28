<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $patients = Patient::with('healthplan')->get();
        return view('patient.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('patient.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação
        $validatedData = $request->validate([
            /*
            'name' => 'required',
            'email' => 'required|email|unique:patients',
            'password' => 'required|min:6',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone' => 'required',
            'cpf' => 'required|unique:doctors',
            */
            'health_plan_id' => 'required|exists:health_plan,id',
        ]);

        $patient = new Patient();
        $patient->name = $request->input('name');
        $patient->email = $request->input('email');
        $patient->password = bcrypt($request->input('password'));
        $patient->birth_date = $request->input('birth_date');
        $patient->address = $request->input('address');
        $patient->phone = $request->input('phone');
        $patient->cpf = $request->input('cpf');
        $patient->photo = $request->input('photo');
        $patient->blood_type = $request->input('blood_type');
        $patient->health_plan_id = $request->input('health_plan_id');
        $patient->save();

        return redirect(route('patient.index'))->with('success', 'Paciente criado com sucesso!');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $patient = Patient::findOrFail($id);
        return view('patient.show', ['patient' => $patient]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('patient.edit', [ 'patient' => Patient::find($id) ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação
        $validatedData = $request->validate([
            /*
            'name' => 'required',
            'email' => 'required|email|unique:doctors',
            'password' => 'required|min:6',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone' => 'required',
            'cpf' => 'required|unique:doctors',
            'photo' => 'required',
            */
            'health_plan_id' => 'required|exists:health_plan,id',
        ]);

        $patient = Patient::find($id);
        $patient->update([
            'name' => $request->input('name'),
            'password' => $request->password ? Hash::make($request->password) : $patient->password,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'cpf' => $request->cpf,
            'photo' => $request->photo ? $request->photo->store('photos', 'public') : $patient->photo,
            'blood_type' => $request->blood_type,
            'health_plan_id' => $request->health_plan_id
        ]);

        return redirect(route('patient.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();
        return redirect(route('patient.index'))->with('success', 'Paciente excluído com sucesso!');
    }
}
