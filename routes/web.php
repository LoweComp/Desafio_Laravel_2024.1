<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return redirect(route('dashboard'));
});

//Login
Route::get('/login', function () {
    return view('auth.login');
})->name('login');

//Email
Route::get('/email', function () {
    return view('mail.index');
})->name('mail.index');
Route::post('/email/send', [EmailController::class, 'send'])->name('mail.send');

//Patients
Route::middleware('patient')->group(function () {
    Route::get('/dashboardPatient', function () {
        return view('patient.dashboard');
    })->name('patient.dashboard');
    Route::resource('surgery', \App\Http\Controllers\SurgeryController::class);
    Route::get('/edit', [\App\Http\Controllers\PatientController::class, 'editByID'])->name('patient.editByID');
});

//Doctors
Route::middleware('doctor')->group(function () {
    Route::get('/dashboardDoctor', function () {
        return view('doctor.dashboard');
    })->name('doctor.dashboard');
    Route::get('/indexDOC', [\App\Http\Controllers\SurgeryController::class, 'indexDOC'])->name('surgery.indexDOC');
    Route::get('/pdf', [\App\Http\Controllers\PDFController::class, 'index'])->name('pdf.index');
    Route::get('/editByID', [\App\Http\Controllers\DoctorController::class, 'editByID'])->name('doctor.editByID');
});

//Admin
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::resource('healthplan', \App\Http\Controllers\HealthPlanController::class);
Route::resource('specialty', \App\Http\Controllers\SpecialtyController::class);
Route::resource('patient', \App\Http\Controllers\PatientController::class);
Route::resource('doctor', \App\Http\Controllers\DoctorController::class);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
