<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;

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
    return view('welcome');
});

// Authentication Routes
Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
Route::get('register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('register', [RegisterController::class, 'register']);

// Protected routes for authenticated users
Route::middleware(['auth'])->group(function () {
    // Admin routes
    Route::middleware(['admin'])->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard'])->name('dashboard');
        Route::resource('employees', AdminController::class);
    });

    // Staff routes
    Route::middleware(['staff'])->prefix('staff')->name('staff.')->group(function () {
        Route::get('/dashboard', [StaffController::class, 'dashboard'])->name('dashboard');
        Route::get('/employees/{employee}', [StaffController::class, 'show'])->name('employees.show');
    });

    // Guest routes (authenticated guests)
    Route::middleware(['guest'])->prefix('guest')->name('guest.')->group(function () {
        Route::get('/dashboard', [GuestController::class, 'dashboard'])->name('dashboard');
        Route::get('/employees', [GuestController::class, 'index'])->name('employees.index');
        Route::get('/employees/{employee}', [GuestController::class, 'show'])->name('employees.show');
    });
});

// Public routes for guests without login
Route::prefix('public')->name('public.')->group(function () {
    Route::get('/employees', [GuestController::class, 'index'])->name('employees.index');
    Route::get('/employees/{employee}', [GuestController::class, 'show'])->name('employees.show');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
