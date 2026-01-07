@extends('layouts.app')
@section('title', 'Tambah Gaji')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Tambah Gaji Karyawan</h4>
        <a href="{{ route('salaries.index') }}" class="btn btn-secondary btn-sm">
            Kembali
        </a>
    </div>

    {{-- FORM --}}
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('salaries.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Karyawan</label>
                    <select name="employee_id" class="form-select" required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($employees as $emp)
                            <option value="{{ $emp->id }}">{{ $emp->nama }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Gaji Pokok</label>
                        <input type="number" name="gaji_pokok" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tunjangan</label>
                        <input type="number" name="tunjangan" class="form-control" value="0">
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Potongan</label>
                        <input type="number" name="potongan" class="form-control" value="0">
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Bulan</label>
                    <input type="month" name="bulan" class="form-control" required>
                </div>

                <div class="text-end">
                    <button class="btn btn-success">
                        Simpan Gaji
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
