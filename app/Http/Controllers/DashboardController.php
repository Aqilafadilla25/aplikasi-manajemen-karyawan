<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Jabatan;
use App\Models\Division;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            abort(403);
        }

        $totalEmployees = Employee::count();
        $totalJabatans  = Jabatan::count();
        $totalDivisions = Division::count();

        return view('dashboard.index', compact(
            'user',
            'totalEmployees',
            'totalJabatans',
            'totalDivisions'
        ));
    }




    /**
     * Dashboard Admin
     * /admin/dashboard
     */
    public function admin()
    {
        return view('dashboard.admin');
    }

    /**
     * Dashboard Staff
     * /staff/dashboard
     */
    public function staff()
    {
        return view('dashboard.staff');
    }
}
