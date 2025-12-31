<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DivisionController;
use App\Http\Controllers\JabatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

/*
|--------------------------------------------------------------------------
| ROOT
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return redirect()->route('login');
});

/*
|--------------------------------------------------------------------------
| AUTH (GUEST ONLY)
|--------------------------------------------------------------------------
*/
Route::middleware('guest')->group(function () {

    Route::get('/login', [LoginController::class, 'showLoginForm'])
        ->name('login');
    Route::post('/login', [LoginController::class, 'login']);

    Route::get('/register', [RegisterController::class, 'showRegistrationForm'])
        ->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

});

/*
|--------------------------------------------------------------------------
| AUTHENTICATED AREA
|--------------------------------------------------------------------------
*/
Route::middleware('auth')->group(function () {

    // LOGOUT
    Route::post('/logout', [LoginController::class, 'logout'])
        ->name('logout');

    // DASHBOARD
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    // ================= DATA KARYAWAN =================
    Route::get('/employees', [EmployeeController::class, 'index'])->name('employees.index');
    Route::get('/employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');

    Route::middleware('role:staff,admin')->group(function () {
        Route::get('/employees/create', [EmployeeController::class, 'create'])->name('employees.create');
        Route::post('/employees', [EmployeeController::class, 'store'])->name('employees.store');
        Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
        Route::put('/employees/{employee}', [EmployeeController::class, 'update'])->name('employees.update');
    });

    Route::middleware('role:admin')->group(function () {
        Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy'])->name('employees.destroy');
    });

    // ================= DIVISI =================
    Route::get('/divisions', [DivisionController::class, 'index'])->name('divisions.index');

    Route::middleware('role:staff,admin')->group(function () {
        Route::get('/divisions/create', [DivisionController::class, 'create'])->name('divisions.create');
        Route::post('/divisions', [DivisionController::class, 'store'])->name('divisions.store');
        Route::get('/divisions/{division}/edit', [DivisionController::class, 'edit'])->name('divisions.edit');
        Route::put('/divisions/{division}', [DivisionController::class, 'update'])->name('divisions.update');
    });

    Route::middleware('role:admin')->group(function () {
        Route::delete('/divisions/{division}', [DivisionController::class, 'destroy'])->name('divisions.destroy');
    });

    // ================= JABATAN =================
    Route::get('/jabatans', [JabatanController::class, 'index'])->name('jabatans.index');

    Route::middleware('role:staff,admin')->group(function () {
        Route::get('/jabatans/create', [JabatanController::class, 'create'])->name('jabatans.create');
        Route::post('/jabatans', [JabatanController::class, 'store'])->name('jabatans.store');
        Route::get('/jabatans/{jabatan}/edit', [JabatanController::class, 'edit'])->name('jabatans.edit');
        Route::put('/jabatans/{jabatan}', [JabatanController::class, 'update'])->name('jabatans.update');
    });

    Route::middleware('role:admin')->group(function () {
        Route::delete('/jabatans/{jabatan}', [JabatanController::class, 'destroy'])->name('jabatans.destroy');
    });

    // ================= USER MANAGEMENT =================
    Route::middleware('role:admin')->group(function () {
        Route::resource('users', UserController::class)->except(['show']);
    });

});
