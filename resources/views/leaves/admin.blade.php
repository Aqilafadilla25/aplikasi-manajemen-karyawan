@extends('layouts.app')
@section('title','Data Pengajuan Cuti')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="mb-3">
        <h4 class="mb-0">Data Pengajuan Cuti</h4>
        <p class="text-muted">
            Daftar pengajuan cuti karyawan yang menunggu persetujuan
        </p>
    </div>

    <div class="row">
        @forelse($leaves as $leave)
        <div class="col-md-4">
            <div class="card cuti-card mb-4">
                <div class="card-body">

                    {{-- NAMA --}}
                    <h6 class="fw-bold mb-1">
                        {{ $leave->user->name }}
                    </h6>

                    {{-- TANGGAL --}}
                    <p class="small text-muted mb-2">
                        {{ $leave->tanggal_mulai }}
                        s/d
                        {{ $leave->tanggal_selesai }}
                    </p>

                    {{-- ALASAN --}}
                    <p class="small mb-3">
                        {{ $leave->alasan }}
                    </p>

                    {{-- STATUS --}}
                    <span class="badge 
                            @if($leave->status == 'pending') bg-warning
                            @elseif($leave->status == 'disetujui') bg-success
                            @else bg-danger
                            @endif
                        ">
                        {{ ucfirst($leave->status) }}
                    </span>

                    {{-- AKSI (HANYA JIKA PENDING) --}}
                    @if($leave->status == 'pending')
                    <div class="d-flex gap-2 mt-3">
                        <form method="POST" action="{{ url('/cuti/'.$leave->id.'/disetujui') }}">
                            @csrf
                            <button class="btn btn-success btn-sm">
                                Terima
                            </button>
                        </form>

                        <form method="POST" action="{{ url('/cuti/'.$leave->id.'/ditolak') }}">
                            @csrf
                            <button class="btn btn-danger btn-sm">
                                Tolak
                            </button>
                        </form>
                    </div>
                    @endif

                </div>
            </div>
        </div>
        @empty
        <div class="col-12">
            <div class="alert alert-info text-center">
                Belum ada pengajuan cuti
            </div>
        </div>
        @endforelse
    </div>

</div>

{{-- STYLE HOVER CARD --}}
<style>
    .cuti-card {
        transition: all 0.3s ease;
        border: 1px solid #eaeaea;
    }

    .cuti-card:hover {
        transform: translateY(-8px);
        box-shadow: 0 12px 25px rgba(0, 0, 0, 0.15);
    }
</style>
@endsection