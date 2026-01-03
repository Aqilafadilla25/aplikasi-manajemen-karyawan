<?php
namespace App\Http\Controllers;

use App\Models\Absensi;

class AdminAbsensiController extends Controller
{
    public function index()
    {
        $absensis = Absensi::with('employee.jabatan')
            ->orderBy('tanggal', 'desc')
            ->get();

        return view('absensi.admin', compact('absensis'));
    }
}
