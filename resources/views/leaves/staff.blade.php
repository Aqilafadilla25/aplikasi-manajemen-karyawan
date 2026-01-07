@extends('layouts.app')
@section('title','Pengajuan Cuti')

@section('content')
<div class="container">

    <h4 class="mb-3">Pengajuan Cuti</h4>

    {{-- FORM --}}
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6 mb-2">
                        <label class="form-label">Tanggal Mulai</label>
                        <input type="date" name="tanggal_mulai" class="form-control" required>
                    </div>

                    <div class="col-md-6 mb-2">
                        <label class="form-label">Tanggal Selesai</label>
                        <input type="date" name="tanggal_selesai" class="form-control" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Alasan Cuti</label>
                    <textarea name="alasan" class="form-control" required></textarea>
                </div>

                <button class="btn btn-primary">
                    Ajukan Cuti
                </button>
            </form>
        </div>
    </div>

    {{-- LIST CUTI --}}
    <div class="row">
        @forelse($leaves as $leave)
            <div class="col-md-4">
                <div class="card cuti-card mb-3">
                    <div class="card-body">
                        <h6 class="mb-1">
                            {{ $leave->tanggal_mulai }} - {{ $leave->tanggal_selesai }}
                        </h6>

                        <span class="badge
                            bg-{{ $leave->status == 'pending' ? 'warning' : ($leave->status == 'disetujui' ? 'success' : 'danger') }}">
                            {{ ucfirst($leave->status) }}
                        </span>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center text-muted">
                Belum ada pengajuan cuti
            </div>
        @endforelse
    </div>

</div>
@endsection

@push('styles')
<style>
    .cuti-card {
        transition: all 0.25s ease;
    }

    .cuti-card:hover {
        transform: translateY(-6px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.12);
    }
</style>
@endpush
