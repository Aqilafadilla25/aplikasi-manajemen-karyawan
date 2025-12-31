@extends('layouts.app')
@section('title', 'Edit Jabatan')

@section('content')
<div class="container">
    <h4 class="mb-3">Edit Jabatan</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('jabatans.update', $jabatan->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- DIVISI --}}
                <div class="mb-3">
                    <label class="form-label">Divisi</label>
                    <select name="division_id"
                        class="form-control @error('division_id') is-invalid @enderror">
                        @foreach ($divisions as $division)
                            <option value="{{ $division->id }}"
                                {{ $jabatan->division_id == $division->id ? 'selected' : '' }}>
                                {{ $division->name }}
                            </option>
                        @endforeach
                    </select>
                    @error('division_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- NAMA JABATAN --}}
                <div class="mb-3">
                    <label class="form-label">Nama Jabatan</label>
                    <input
                        type="text"
                        name="nama_jabatan"
                        class="form-control @error('nama_jabatan') is-invalid @enderror"
                        value="{{ old('nama_jabatan', $jabatan->nama_jabatan) }}">
                    @error('nama_jabatan')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- ACTION --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('jabatans.index') }}"
                       class="btn btn-secondary me-2">Batal</a>
                    <button class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
