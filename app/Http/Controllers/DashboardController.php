<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Division;
use App\Models\Jabatan;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        return view('dashboard.index', [
            'user'            => $user,
            'totalEmployees'  => Employee::count(),
            'totalDivisions'  => Division::count(),
            'totalJabatans'   => Jabatan::count(),
        ]);
    }
}
