@extends('layouts.app')
@section('title','Dashboard Admin')

@section('content')
<div class="container">

    <h3 class="fw-bold mb-1">👋 Selamat datang, Administrator</h3>
    <p class="text-muted mb-4">Role: <strong>ADMIN</strong></p>

    {{-- STAT CARDS --}}
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card shadow rounded-4">
                <div class="card-body">
                    <small>Total</small>
                    <h6>Karyawan</h6>
                    <h2 class="text-primary">{{ $totalEmployees }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow rounded-4">
                <div class="card-body">
                    <small>Total</small>
                    <h6>Jabatan</h6>
                    <h2 class="text-warning">{{ $totalJabatans }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow rounded-4">
                <div class="card-body">
                    <small>Total</small>
                    <h6>Divisi</h6>
                    <h2 class="text-success">{{ $totalDivisions }}</h2>
                </div>
            </div>
        </div>
    </div>

    {{-- CUTI --}}
    <div class="row g-4 mb-4">
        <div class="col-md-3">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6>Cuti Pending</h6>
                    <h3 class="text-warning">{{ $pendingLeaves }}</h3>
                </div>
            </div>
        </div>
    </div>

    {{-- STATUS HARI INI --}}
    <div class="card shadow-sm">
        <div class="card-header fw-semibold">Status Hari Ini</div>
        <div class="card-body">
            <p>🕒 Absensi Masuk: <strong>{{ $absenMasuk }}</strong></p>
            <p>❌ Belum Absen: <strong>{{ $belumAbsen }}</strong></p>
            <p>📅 Cuti Aktif: <strong>{{ $cutiAktif }}</strong></p>
        </div>
    </div>

</div>
@endsection
