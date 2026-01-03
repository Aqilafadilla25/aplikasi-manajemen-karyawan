@extends('layouts.app')
@section('title', 'Edit Absensi')

@section('content')
<div class="container">

    <h4 class="mb-3 fw-semibold">✏️ Edit Data Absensi</h4>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <form action="{{ route('absensis.update', $absensi->id) }}" method="POST">
                @csrf
                @method('PUT')

                {{-- KARYAWAN --}}
                <div class="mb-3">
                    <label class="form-label">Karyawan</label>
                    <select name="employee_id" class="form-select" required>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}"
                                {{ $absensi->employee_id == $emp->id ? 'selected' : '' }}>
                                {{ $emp->nama }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- TANGGAL --}}
                <div class="mb-3">
                    <label class="form-label">Tanggal</label>
                    <input type="date"
                           name="tanggal"
                           value="{{ $absensi->tanggal }}"
                           class="form-control"
                           required>
                </div>

                {{-- JAM --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Masuk</label>
                        <input type="time"
                               name="jam_masuk"
                               value="{{ $absensi->jam_masuk }}"
                               class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label">Jam Keluar</label>
                        <input type="time"
                               name="jam_keluar"
                               value="{{ $absensi->jam_keluar }}"
                               class="form-control">
                    </div>
                </div>

                {{-- STATUS --}}
                <div class="mb-3">
                    <label class="form-label">Status</label>
                    <select name="status" class="form-select">
                        @foreach(['hadir','izin','sakit','alpha'] as $status)
                            <option value="{{ $status }}"
                                {{ $absensi->status === $status ? 'selected' : '' }}>
                                {{ ucfirst($status) }}
                            </option>
                        @endforeach
                    </select>
                </div>

                {{-- KETERANGAN --}}
                <div class="mb-3">
                    <label class="form-label">Keterangan</label>
                    <textarea name="keterangan"
                              class="form-control"
                              rows="3">{{ $absensi->keterangan }}</textarea>
                </div>

                <div class="d-flex justify-content-end">
                    <a href="{{ route('absensis.index') }}" class="btn btn-secondary me-2">
                        Kembali
                    </a>
                    <button class="btn btn-primary">
                        Update
                    </button>
                </div>

            </form>

        </div>
    </div>

</div>
@endsection
