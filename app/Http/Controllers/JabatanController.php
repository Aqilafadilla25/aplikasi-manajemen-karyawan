<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Jabatan;
use Illuminate\Http\Request;

class JabatanController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->query('search');
        $divisionId = $request->query('division_id'); // filter divisi

        $divisions = Division::orderBy('name')->get(); // untuk dropdown filter

        $jabatans = Jabatan::with('division')
            ->when($search, function ($query, $search) {
                $query->where('nama_jabatan', 'like', "%{$search}%")
                    ->orWhereHas('division', function ($q) use ($search) {
                        $q->where('name', 'like', "%{$search}%");
                    });
            })
            ->when($divisionId, function ($query, $divisionId) {
                $query->where('division_id', $divisionId);
            })
            ->orderBy('nama_jabatan')
            ->simplepaginate(10)
            ->withQueryString();

        return view('jabatans.index', compact('jabatans', 'search', 'divisions', 'divisionId'));
    }

    public function create()
    {
        $divisions = Division::orderBy('name')->get();
        return view('jabatans.create', compact('divisions'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'division_id'  => 'required|exists:divisions,id',
            'nama_jabatan' => 'required|string|max:100',
        ]);

        Jabatan::create([
            'division_id'  => $request->division_id,
            'nama_jabatan' => $request->nama_jabatan,
        ]);

        return redirect()
            ->route('jabatans.index')
            ->with('success', 'Jabatan berhasil ditambahkan');
    }

    public function edit(Jabatan $jabatan)
    {
        $divisions = Division::orderBy('name')->get();
        return view('jabatans.edit', compact('jabatan', 'divisions'));
    }

    public function update(Request $request, Jabatan $jabatan)
    {
        $request->validate([
            'division_id'  => 'required|exists:divisions,id',
            'nama_jabatan' => 'required|string|max:100',
        ]);

        $jabatan->update([
            'division_id'  => $request->division_id,
            'nama_jabatan' => $request->nama_jabatan,
        ]);

        return redirect()
            ->route('jabatans.index')
            ->with('success', 'Jabatan berhasil diperbarui');
    }
}
