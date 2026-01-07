@extends('layouts.app')
@section('title', 'Dashboard Staff')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="mb-4">
        <h3 class="fw-bold">
            👋 Selamat datang, {{ $user->name }}
        </h3>
        <p class="text-muted">
            Role: <strong>STAFF</strong>
        </p>
    </div>

    {{-- CARD STATISTIK STAFF --}}
    <div class="row g-4">

        {{-- ABSENSI HARI INI --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar me-3 bg-primary text-white rounded">
                        <i class="ri-fingerprint-line ri-24px"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Absensi Hari Ini</h6>
                        <small class="text-muted">Status</small>
                        <h5 class="mb-0 text-success">
                            {{ $sudahAbsen ? 'Sudah Absen' : 'Belum Absen' }}
                        </h5>
                    </div>
                </div>
            </div>
        </div>

        {{-- CUTI PENDING --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar me-3 bg-warning text-white rounded">
                        <i class="ri-calendar-event-line ri-24px"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Cuti Pending</h6>
                        <small class="text-muted">Pengajuan Saya</small>
                        <h4 class="mb-0">{{ $cutiPending }}</h4>
                    </div>
                </div>
            </div>
        </div>

        {{-- SLIP GAJI --}}
        <div class="col-md-4">
            <div class="card shadow-sm border-0 rounded-4 h-100">
                <div class="card-body d-flex align-items-center">
                    <div class="avatar me-3 bg-success text-white rounded">
                        <i class="ri-money-dollar-circle-line ri-24px"></i>
                    </div>
                    <div>
                        <h6 class="mb-0">Slip Gaji</h6>
                        <small class="text-muted">Tersedia</small>
                        <h4 class="mb-0">{{ $totalSlipGaji }}</h4>
                    </div>
                </div>
            </div>
        </div>

    </div>

    {{-- INFORMASI CUTI --}}
    <div class="row mt-4">
        <div class="col-md-6">
            <div class="card shadow-sm h-100">
                <div class="card-header fw-semibold">
                    Status Pengajuan Cuti Saya
                </div>
                <div class="card-body">
                    <p class="mb-1 text-warning">
                        ⏳ Pending: <strong>{{ $cutiPending }}</strong>
                    </p>
                    <p class="mb-1 text-success">
                        ✅ Disetujui: <strong>{{ $cutiDisetujui }}</strong>
                    </p>
                    <p class="mb-0 text-danger">
                        ❌ Ditolak: <strong>{{ $cutiDitolak }}</strong>
                    </p>
                </div>
            </div>
        </div>

    </div>

    {{-- INFO --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 bg-light">
                <div class="card-body">
                    <h6 class="fw-semibold mb-2">📌 Informasi</h6>
                    <p class="text-muted mb-0">
                        Dashboard staff menampilkan ringkasan aktivitas pribadi seperti absensi,
                        pengajuan cuti, dan slip gaji.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection