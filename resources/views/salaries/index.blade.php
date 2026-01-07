@extends('layouts.app')
@section('title', 'Data Gaji')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Data Gaji Karyawan</h4>
        <a href="{{ route('salaries.create') }}" class="btn btn-primary btn-sm">
            Tambah Gaji
        </a>
    </div>

    {{-- TABLE --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Bulan</th>
                        <th>Total Gaji</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($salaries as $salary)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $salary->employee->nama }}</td>
                            <td>{{ \Carbon\Carbon::parse($salary->bulan)->format('F Y') }}</td>
                            <td>
                                <span class="badge bg-success">
                                    Rp {{ number_format($salary->total_gaji) }}
                                </span>
                            </td>
                            <td>
                                <form action="{{ route('salaries.destroy', $salary->id) }}" method="POST"
                                      onsubmit="return confirm('Hapus data gaji ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-center text-muted">
                                Data gaji belum tersedia
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- PAGINATION --}}
            <div class="mt-3">
                {{ $salaries->links() }}
            </div>
        </div>
    </div>

</div>
@endsection
