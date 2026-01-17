<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    // STAFF
    public function index()
    {
        $leaves = Leave::where('user_id', Auth::id())->latest()->get();
        return view('leaves.staff', compact('leaves'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal_mulai' => 'required|date',
            'tanggal_selesai' => 'required|date|after_or_equal:tanggal_mulai',
            'alasan' => 'required|string',
        ]);

        Leave::create([
            'user_id' => Auth::id(),
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
            'alasan' => $request->alasan,
        ]);

        return redirect()->back()
            ->with('success', 'Pengajuan cuti berhasil dikirim dan menunggu persetujuan admin.');
    }

    // ADMIN
    public function admin()
    {
        $leaves = Leave::with('user')->latest()->get();
        return view('leaves.admin', compact('leaves'));
    }

    public function updateStatus(Leave $leave, $status)
    {
        $leave->update(['status' => $status]);
        return back();
    }
}
