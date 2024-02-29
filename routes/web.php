<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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
//Todo Redirecionar user para dashboard que tem acesso
Route::get('/', function () {
    return redirect(route('dashboard'));
});

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/test', function () {
    return view('test');
});

Route::resource('healthplan', \App\Http\Controllers\HealthPlanController::class);
Route::resource('specialty', \App\Http\Controllers\SpecialtyController::class);
Route::resource('patient', \App\Http\Controllers\PatientController::class);

Route::middleware('patient')->group(function () {
    Route::get('/dashboardPatient', function () {
        echo "dashboard do paciente aqui";
    })->name('patient.dashboard');
});

Route::resource('doctor', \App\Http\Controllers\DoctorController::class);

Route::middleware('doctor')->group(function () {
    Route::get('/dashboardDoctor', function () {
        echo "dashboard do doutor aqui";
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
