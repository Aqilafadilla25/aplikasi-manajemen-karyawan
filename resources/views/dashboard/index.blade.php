@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="mb-4">
        <h3 class="fw-bold">
            👋 Selamat datang, {{ $user->name }}
        </h3>
        <p class="text-muted">
            Role: <strong>{{ strtoupper($user->role) }}</strong>
        </p>
    </div>

    {{-- ================= ADMIN & STAFF ================= --}}
    @if(in_array($user->role, ['admin', 'staff','guest']))
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body">
                    <small>Total</small>
                    <h5>Karyawan</h5>
                    <h2 class="text-primary">{{ $totalEmployees }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body">
                    <small>Total</small>
                    <h5 class="text-warning">Jabatan</h5>
                    <h2 class="text-warning">{{ $totalJabatans }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4">
                <div class="card-body">
                    <small>Total</small>
                    <h5 class="text-success">Divisi</h5>
                    <h2 class="text-success">{{ $totalDivisions }}</h2>
                </div>
            </div>
        </div>

    </div>
    @endif

    {{-- ================= INFO ================= --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 bg-light">
                <div class="card-body">
                    <h6 class="fw-semibold mb-2">📊 Sistem Manajemen Karyawan</h6>
                    <p class="text-muted mb-0">
                        Gunakan menu di sebelah kiri untuk mengelola data karyawan,
                        jabatan, divisi, dan user sesuai dengan hak akses akunmu.
                    </p>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection
