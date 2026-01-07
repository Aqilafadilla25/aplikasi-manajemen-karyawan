<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    // ADMIN - LIST
    public function index()
    {
        $jobs = Job::latest()->paginate(10);
        return view('jobs.index', compact('jobs'));
    }

    // ADMIN - FORM CREATE
    public function create()
    {
        return view('jobs.create');
    }

    // ADMIN - STORE
    public function store(Request $request)
    {
        $request->validate([
            'judul'     => 'required',
            'divisi'    => 'required',
            'lokasi'    => 'required',
            'tipe'      => 'required',
            'deskripsi' => 'required',
        ]);

        Job::create([
            'judul'     => $request->judul,
            'divisi'    => $request->divisi,
            'lokasi'    => $request->lokasi,
            'tipe'      => $request->tipe,
            'deskripsi' => $request->deskripsi,
            'status'    => 'aktif',
        ]);

        return redirect()->route('jobs.index')
            ->with('success', 'Lowongan berhasil ditambahkan');
    }

    // ADMIN - DELETE
    public function destroy(Job $job)
    {
        $job->delete();
        return back()->with('success', 'Lowongan berhasil dihapus');
    }

    public function public()
    {
        $jobs = Job::where('status', 'aktif')->latest()->get();
        return view('jobs.public', compact('jobs'));
    }
}
