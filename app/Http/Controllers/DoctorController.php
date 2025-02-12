<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $doctors = Doctor::all();
        $specialties = Specialty::all();
        return view('doctor.index', compact('doctors', 'specialties'));
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create()
    {
        $specialties = Specialty::all();
        return view('doctor.create', ['specialties' => $specialties]);
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
            'email' => 'required|email|unique:doctors',
            'password' => 'required|min:6',
            'birth_date' => 'required|date',
            'address' => 'required',
            'phone' => 'required',
            'cpf' => 'required|unique:doctors',
            'working_period' => 'required',
            'CRM' => 'required',
            */
            'photo' => 'nullable',
            'specialty_id' => 'required|exists:specialties,id',
        ]);

        $doctor = new Doctor();
        $doctor->name = $request->input('name');
        $doctor->email = $request->input('email');
        $doctor->password = bcrypt($request->input('password'));
        $doctor->birth_date = $request->input('birth_date');
        $doctor->address = $request->input('address');
        $doctor->phone = $request->input('phone');
        $doctor->cpf = $request->input('cpf');
        $doctor->photo = $request->input('photo');
        $doctor->working_period = $request->input('working_period');
        $doctor->crm = $request->input('crm');
        $doctor->specialty_id = $request->input('specialty_id');
        $doctor->save();

        return redirect(route('doctor.index'))->with('success', 'Médico criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        $specialties = Specialty::all();
        return view('doctor.show', compact('doctor', 'specialties'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        $specialties = Specialty::all();
        return view('doctor.edit', compact('doctor', 'specialties'));
    }

    public function editByID()
    {
        $doctor = Auth::guard('doctor')->user();
        $specialties = Specialty::all();
        return view('doctor.editByID', ['specialties' => $specialties, 'doctor' => $doctor]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validação
        $validatedData = $request->validate([
            /*
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:doctors,email,' . $doctor->id,
            'password' => 'nullable|string|min:8',
            'birth_date' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:11',
            'cpf' => 'required|string|max:11|unique:doctors,cpf,' . $doctor->id,
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'working_period' => 'required|string|max:255',
            'CRM' => 'required|string|max:255|unique:doctors,CRM,' . $doctor->id,
            */
            'photo' => 'nullable',
            'specialty_id' => 'required|exists:specialties,id',
        ]);

        $doctor = Doctor::find($id);
        $doctor->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $doctor->password,
            'birth_date' => $request->birth_date,
            'address' => $request->address,
            'phone' => $request->phone,
            'cpf' => $request->cpf,
            'photo' => $request->photo,
            'working_period' => $request->working_period,
            'CRM' => $request->crm,
            'specialty_id' => $request->specialty_id,
        ]);

        return redirect(route('doctor.index'))->with('success', 'Médico atualizado com sucesso!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $doctor = Doctor::findOrFail($id);
        $doctor->delete();
        return redirect(route('doctor.index'))->with('success', 'Médico excluído com sucesso!');
    }
}
