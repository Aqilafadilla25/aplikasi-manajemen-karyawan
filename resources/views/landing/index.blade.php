@extends('layouts.app')
@section('title', 'Selamat Datang')

@php($hideSidebar = true)

@section('content')
<div class="container">

    {{-- HERO / PENGENALAN --}}
    <div class="card mb-4">
        <div class="card-body text-center py-5">
            <h2 class="fw-bold mb-3">Sistem Manajemen Karyawan</h2>

            <p class="text-muted mb-4 mx-auto" style="max-width: 700px;">
                Sistem Manajemen Karyawan adalah aplikasi berbasis web yang dirancang
                untuk membantu perusahaan dalam mengelola data karyawan, absensi,
                pengajuan cuti dan izin, serta penggajian secara terintegrasi dan efisien.
            </p>

            <div class="d-flex justify-content-center gap-2">
                <a href="{{ route('login') }}" class="btn btn-primary">
                    Login
                </a>
                <a href="{{ route('register') }}" class="btn btn-outline-primary">
                    Register
                </a>
            </div>
        </div>
    </div>

    {{-- FITUR UTAMA --}}
    <div class="mb-4">
        <h5 class="mb-3">Fitur Utama Aplikasi</h5>

        <div class="row text-center">
            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h6>Manajemen Karyawan</h6>
                        <p class="text-muted small">
                            Mengelola data karyawan seperti identitas, jabatan,
                            divisi, dan status kerja secara terpusat.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h6>Absensi Digital</h6>
                        <p class="text-muted small">
                            Sistem absensi online dengan fitur check-in dan
                            check-out yang tercatat secara otomatis.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h6>Cuti & Izin</h6>
                        <p class="text-muted small">
                            Pengajuan cuti dan izin karyawan secara online
                            dengan proses yang lebih cepat dan terdokumentasi.
                        </p>
                    </div>
                </div>
            </div>

            <div class="col-md-3">
                <div class="card h-100 shadow-sm">
                    <div class="card-body">
                        <h6>Slip Gaji</h6>
                        <p class="text-muted small">
                            Informasi slip gaji karyawan yang transparan
                            dan dapat diakses sesuai periode.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- LOWONGAN PEKERJAAN --}}
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <h5 class="mb-0">Lowongan Pekerjaan</h5>
                <small class="text-muted">
                    Informasi lowongan pekerjaan yang tersedia di perusahaan
                </small>
            </div>

            <a href="{{ route('jobs.index') }}" class="btn btn-sm btn-primary">
                Lihat Semua
            </a>
        </div>

        <div class="card-body">
            <div class="row">
                @forelse($jobs as $job)
                    <div class="col-md-4">
                        <div class="card mb-3 border shadow-sm">
                            <div class="card-body">
                                <h6 class="mb-1">{{ $job->judul }}</h6>

                                <p class="small text-muted mb-2">
                                    {{ $job->divisi }} • {{ $job->lokasi }}
                                </p>

                                <p class="small text-muted">
                                    {{ Str::limit($job->deskripsi, 100) }}
                                </p>

                                <span class="badge bg-secondary">
                                    {{ $job->tipe }}
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="col-12 text-center text-muted py-4">
                        Belum ada lowongan pekerjaan yang tersedia
                    </div>
                @endforelse
            </div>
        </div>
    </div>

</div>
@endsection
