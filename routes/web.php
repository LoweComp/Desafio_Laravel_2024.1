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

/*Route::get('/view-email', function () {
    return new \App\Mail\AvisaPaciente();
})->name('view.email');
*/

//admin
Route::resource('healthplan', \App\Http\Controllers\HealthPlanController::class);
Route::resource('specialty', \App\Http\Controllers\SpecialtyController::class);

Route::resource('surgery', \App\Http\Controllers\SurgeryController::class);

Route::middleware('patient')->get('/surgery/create', [\App\Http\Controllers\SurgeryController::class, 'create'])->name('surgery.create');
Route::middleware('patient')->post('/surgery/store', [\App\Http\Controllers\SurgeryController::class, 'store'])->name('surgery.store');
Route::middleware('patient')->delete('/surgery/{surgery}', [\App\Http\Controllers\SurgeryController::class, 'destroy'])->name('surgery.destroy');


Route::resource('patient', \App\Http\Controllers\PatientController::class);

Route::middleware('patient')->group(function () {
    Route::get('/dashboardPatient', function () {
        return view('patient.dashboard');
    })->name('patient.dashboard');
});

Route::resource('doctor', \App\Http\Controllers\DoctorController::class);

Route::middleware('doctor')->group(function () {
    Route::get('/dashboardDoctor', function () {
        return view('doctor.dashboard');
    })->name('doctor.dashboard');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
