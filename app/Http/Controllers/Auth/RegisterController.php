<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Employee;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => 'staff',
        ]);

        Employee::create([
            'user_id' => $user->id,
            'jabatan_id' => 1, // default
            'nama' => $user->name,
            'status' => 'aktif',
        ]);

        Auth::login($user);
        return redirect()->route('dashboard');
    }
}
