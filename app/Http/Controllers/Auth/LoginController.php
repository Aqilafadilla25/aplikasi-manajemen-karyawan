<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function showLoginForm()
{
    if (auth::check()) {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
    }

    return view('auth.login');
}


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah',
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

    /**
     * LOGIN SEBAGAI GUEST (READ ONLY)
     */
    public function loginAsGuest()
    {
        $guest = User::create([
            'name'     => 'Guest User',
            'email'    => 'guest_' . Str::random(6) . '@guest.local',
            'password' => bcrypt(Str::random(12)),
            'role'     => 'guest',
        ]);

        Auth::login($guest);
        request()->session()->regenerate();

        return redirect()->route('dashboard');
    }
}
