@extends('layouts.app')
@section('title', 'Dashboard')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="mb-4">
        <h3 class="fw-bold mb-1">
            👋 Selamat datang, {{ auth()->user()->name }}
        </h3>
        <p class="text-muted">
            Semoga harimu produktif di <strong>NA-StaffHub</strong>
        </p>
    </div>

    @if(auth()->user()->role === 'admin')

    {{-- STAT CARDS --}}
    <div class="row g-4">

        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Total</small>
                        <h5 class="fw-semibold mb-1">Karyawan</h5>
                        <h2 class="fw-bold text-primary">{{ $totalEmployees }}</h2>
                    </div>
                    <div class="bg-primary bg-opacity-10 p-3 rounded-circle d-flex justify-content-center align-items-center"
                        style="width:60px; height:60px;">
                        <img src="{{ asset('assets/img/icons/db/3.png') }}" style="width:80px;">
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Total</small>
                        <h5 class="fw-semibold mb-1 text-warning">Jabatan</h5>
                        <h2 class="fw-bold text-warning">
                            {{ $totalJabatans }}
                        </h2>
                    </div>
                    <div class="bg-warning bg-opacity-10 p-3 rounded-circle d-flex justify-content-center align-items-center"
                        style="width:60px;height:60px;">
                        <img src="{{ asset('assets/img/icons/db/2.png') }}" style="width:80px;">
                    </div>
                </div>
            </div>
        </div>


        <div class="col-md-4">
            <div class="card shadow border-0 rounded-4 h-100">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <small class="text-muted">Total</small>
                        <h5 class="fw-semibold mb-1 text-success">Divisi</h5>
                        <h2 class="fw-bold text-success">
                            {{ $totalDivisions }}
                        </h2>
                    </div>
                    <div class="bg-success bg-opacity-10 p-3 rounded-circle d-flex justify-content-center align-items-center"
                        style="width:60px;height:60px;">
                        <img src="{{ asset('assets/img/icons/db/1.png') }}" style="width:80px;">
                    </div>
                </div>
            </div>
        </div>


    </div>


    {{-- INFO BOX --}}
    <div class="row mt-4">
        <div class="col-12">
            <div class="card border-0 shadow-sm rounded-4 bg-light">
                <div class="card-body">
                    <h6 class="fw-semibold mb-2">📊 Sistem Manajemen Karyawan</h6>
                    <p class="text-muted mb-0">
                        Gunakan menu di sebelah kiri untuk mengelola data karyawan, jabatan, divisi, dan user.
                        Semua perubahan akan tercatat secara realtime.
                    </p>
                </div>
            </div>
        </div>
    </div>

    @endif

</div>
@endsection