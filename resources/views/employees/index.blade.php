@extends('layouts.app')

@section('title', 'Data Karyawan')

@section('content')
<div class="container">

    {{-- HEADER + BUTTON --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Data Karyawan</h4>
        
@if(in_array(auth()->user()->role, ['staff','admin']))
<a href="{{ route('employees.create') }}" class="btn btn-primary btn-sm">
    Tambah Data Karyawan
</a>
@endif

    {{-- SEARCH --}}
    <form method="GET" class="mb-3">
        <input type="text"
            name="search"
            class="form-control"
            placeholder="Cari nama karyawan..."
            value="{{ $search }}">
    </form>

    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-bordered mb-0">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($employees as $i => $employee)
                    <tr>
                        <td>{{ $employees->firstItem() + $i }}</td>
                        <td>{{ $employee->nama }}</td>
                        <td>{{ $employee->jabatan->nama_jabatan }}</td>
                        <td>
                            <span class="badge bg-{{ $employee->status == 'aktif' ? 'success' : 'secondary' }}">
                                {{ ucfirst($employee->status) }}
                            </span>
                        </td>
                        <td class="d-flex gap-1">
                            {{-- EDIT: STAFF & ADMIN --}}
                            @if(in_array(auth()->user()->role, ['staff','admin']))
                            <a href="{{ route('employees.edit', $employee->id) }}"
                                class="btn btn-warning btn-sm">Edit</a>
                            @endif

                            {{-- HAPUS: ADMIN ONLY --}}
                            @if(auth()->user()->role === 'admin')
                            <form action="{{ route('employees.destroy', $employee->id) }}"
                                method="POST"
                                onsubmit="return confirm('Apakah yakin ingin menghapus karyawan ini?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                            </form>
                            @endif
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Data tidak ditemukan
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-5">
        {{ $employees->links() }}
    </div>

</div>
@endsection