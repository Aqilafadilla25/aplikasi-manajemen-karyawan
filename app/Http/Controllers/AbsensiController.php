<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    /**
     * STAFF: absensi hari ini
     */
    public function index()
    {
        $employee = $this->employee();

        $absensi = Absensi::where('employee_id', $employee->id)
            ->whereDate('tanggal', now())
            ->first();

        return view('absensi.index', compact('absensi'));
    }


    /**
     * ADMIN: lihat semua absensi
     */
    public function adminIndex()
    {
        $absensis = Absensi::with('employee.jabatan.division')
            ->orderBy('tanggal', 'desc')
            ->paginate(20);

        return view('absensi.admin', compact('absensis'));
    }


    /**
     * STAFF: check in
     */
    public function checkIn()
    {
        $employee = auth::user()->employee;

        if (!$employee) {
            return back()->with('error', 'Data karyawan tidak ditemukan.');
        }

        $exists = Absensi::where('employee_id', $employee->id)
            ->whereDate('tanggal', now())
            ->exists();

        if ($exists) {
            return back()->with('error', 'Kamu sudah absen hari ini.');
        }

        Absensi::create([
            'employee_id' => $employee->id,
            'tanggal'     => now()->toDateString(),
            'jam_masuk'   => now()->toTimeString(),
            'status'      => 'hadir',
        ]);

        return back()->with('success', 'Absen masuk berhasil.');
    }

    /**
     * STAFF: check out
     */
    public function checkOut()
    {
        $employee = $this->employee();

        $absensi = Absensi::where('employee_id', $employee->id)
            ->whereDate('tanggal', now())
            ->firstOrFail();

        if ($absensi->jam_keluar) {
            return back()->with('error', 'Kamu sudah absen keluar.');
        }

        $absensi->update([
            'jam_keluar' => now()->toTimeString(),
        ]);

        return back()->with('success', 'Absen keluar berhasil.');
    }


    private function employee()
    {
        $user = Auth::user();

        if ($user->role !== 'staff') {
            abort(403, 'Hanya staff yang dapat melakukan absensi.');
        }

        if (!$user->employee) {
            abort(403, 'Akun ini belum terhubung dengan data karyawan.');
        }

        return $user->employee;
    }
}
