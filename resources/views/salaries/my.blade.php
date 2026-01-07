@extends('layouts.app')
@section('title', 'Slip Gaji Saya')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="mb-3">
        <h4>Slip Gaji Saya</h4>
        <p class="text-muted mb-0">
            Daftar gaji berdasarkan periode
        </p>
    </div>

    <div class="row">
        @forelse($salaries as $salary)
            <div class="col-md-4">
                <div class="card mb-3 shadow-sm">
                    <div class="card-body">
                        <h6 class="mb-1">
                            {{ \Carbon\Carbon::parse($salary->bulan)->format('F Y') }}
                        </h6>

                        <span class="badge bg-success mb-2">
                            Rp {{ number_format($salary->total_gaji) }}
                        </span>

                        <ul class="list-unstyled small text-muted mt-2">
                            <li>Gaji Pokok: Rp {{ number_format($salary->gaji_pokok) }}</li>
                            <li>Tunjangan: Rp {{ number_format($salary->tunjangan) }}</li>
                            <li>Potongan: Rp {{ number_format($salary->potongan) }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <div class="alert alert-info">
                    Slip gaji belum tersedia.
                </div>
            </div>
        @endforelse
    </div>

</div>
@endsection
