@extends('layouts.app')

@section('title', 'Edit Karyawan')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">Edit Karyawan</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('employees.update', $employee) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- Nama --}}
                <div class="mb-3">
                    <label class="form-label">Nama Karyawan</label>
                    <input type="text" name="nama"
                           class="form-control"
                           value="{{ $employee->nama }}" required>
                </div>

                {{-- Jabatan --}}
                <div class="mb-3">
                    <label class="form-label">Jabatan</label>
                    <select name="jabatan_id" class="form-select" required>
                        @foreach($jabatans as $jabatan)
                            <option value="{{ $jabatan->id }}"
                                {{ $employee->jabatan_id == $jabatan->id ? 'selected' : '' }}>
                                {{ $jabatan->nama_jabatan }}
                                ({{ $jabatan->division->name ?? '-' }})
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- Alamat --}}
                <div class="mb-3">
                    <label class="form-label">Alamat</label>
                    <textarea name="alamat"
                              class="form-control">{{ $employee->alamat }}</textarea>
                </div>

                {{-- No HP --}}
                <div class="mb-3">
                    <label class="form-label">No HP</label>
                    <input type="text" name="no_hp"
                           class="form-control"
                           value="{{ $employee->no_hp }}">
                </div>

                {{-- Status --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        <option value="aktif"
                            {{ $employee->status === 'aktif' ? 'selected' : '' }}>
                            Aktif
                        </option>
                        <option value="nonaktif"
                            {{ $employee->status === 'nonaktif' ? 'selected' : '' }}>
                            Nonaktif
                        </option>
                    </select>
                </div>

                <div class="text-end">
                    <a href="{{ route('employees.index') }}"
                       class="btn btn-secondary btn-sm">Kembali</a>
                    <button class="btn btn-primary btn-sm">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
