@extends('layouts.app')
@section('title', 'Tambah Absensi')

@section('content')
<div class="container">

    <h4 class="mb-3 fw-semibold">➕ Tambah Data Absensi</h4>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <form action="{{ route('absensis.store') }}" method="POST">
                @csrf

                {{-- KARYAWAN --}}
                <div class="mb-3">
                    <label class="form-label">Karyawan</label>
                    <select name="employee_id" class="form-select" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">
                                {{ $emp->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- TANGGAL --}}
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date" name="tanggal" class="form-control" required>
                </div>

                {{-- JAM --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Masuk</label>
                        <input type="time" name="jam_masuk" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Keluar</label>
                        <input type="time" name="jam_keluar" class="form-control">
                    </div>
                </div>

                {{-- STATUS --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select" required>
                        <option value="hadir">Hadir</option>
                        <option value="izin">Izin</option>
                        <option value="sakit">Sakit</option>
                        <option value="alpha">Alpha</option>
                    </select>
                </div>

                {{-- KETERANGAN --}}
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan" class="form-control" rows="3"></textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('absensis.index') }}" class="btn btn-secondary me-2">
                        Kembali
                    </a>
                    <button class="btn btn-primary">
                        Simpan
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
