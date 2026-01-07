<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Employee;
use App\Models\Division;
use App\Models\Jabatan;
use App\Models\Leave;
use App\Models\Absensi;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        /*  ADMIN  */
        if ($user->role === 'admin') {
            return view('dashboard.admin', [
                'user'           => $user,
                'totalEmployees' => Employee::count(),
                'totalDivisions' => Division::count(),
                'totalJabatans'  => Jabatan::count(),
                'pendingLeaves'  => Leave::where('status', 'pending')->count(),
                'absenMasuk'     => Absensi::whereDate('created_at', today())->count(),
                'belumAbsen'     => Employee::count()
                                     - Absensi::whereDate('created_at', today())->count(),
                'cutiAktif'      => Leave::where('status', 'disetujui')->count(),
            ]);
        }

        /* STAFF  */
        if ($user->role === 'staff') {

    $employeeId = $user->employee->id ?? null;

    return view('dashboard.staff', [
        'user' => $user,

        // ABSENSI
        'sudahAbsen' => $employeeId
            ? Absensi::where('employee_id', $employeeId)
                ->whereDate('created_at', today())
                ->exists()
            : false,

        // CUTI
        'cutiPending' => Leave::where('user_id', $user->id)
            ->where('status', 'pending')
            ->count(),

        'cutiDisetujui' => Leave::where('user_id', $user->id)
            ->where('status', 'disetujui')
            ->count(),

        'cutiDitolak' => Leave::where('user_id', $user->id)
            ->where('status', 'ditolak')
            ->count(),

        // SLIP GAJI
        'totalSlipGaji' => $employeeId
            ? \App\Models\Salary::where('employee_id', $employeeId)->count()
            : 0,
    ]);


        }
    }
}
