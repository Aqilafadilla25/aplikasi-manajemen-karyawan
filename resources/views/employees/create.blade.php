@extends('layouts.app')

@section('title', 'Tambah Karyawan')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">Tambah Karyawan</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('employees.store') }}" method="POST">
                @csrf

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama Karyawan</label>
                    <input type="text" name="nama"
                           class="form-control" required>
                </div>

                {{-- Jabatan --}}
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <select name="jabatan_id" class="form-select" required>
                        <option value="">-- Pilih Jabatan --</option>
                        @foreach($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}">
                                {{ $jabatan->nama_jabatan }}
                                ({{ $jabatan->division->name ?? '-' }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat" class="form-control"></textarea>
                </div>

                {{-- No HP --}}
                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp" class="form-control">
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </div>

                <div class="text-end">
                    <a href="{{ route('employees.index') }}"
                       class="btn btn-secondary btn-sm">Kembali</a>
                    <button class="btn btn-primary btn-sm">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
