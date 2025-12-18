<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmployeeController;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
});

// --------------------------------------
Route::get('/dashboard', function () {
    return view('dashboard.admin'); // sementara
})->name('dashboard');

// --------------------------------------------


Route::resource('/admin/employees', EmployeeController::class);



