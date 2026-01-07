@extends('layouts.app')
@section('title', 'Lowongan Pekerjaan')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Lowongan Pekerjaan</h4>
        <a href="{{ route('jobs.create') }}" class="btn btn-primary btn-sm">
            Tambah Lowongan
        </a>
    </div>

    {{-- TABLE --}}
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Divisi</th>
                        <th>Lokasi</th>
                        <th>Tipe</th>
                        <th>Status</th>
                        <th width="15%">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($jobs as $job)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $job->judul }}</td>
                        <td>{{ $job->divisi }}</td>
                        <td>{{ $job->lokasi }}</td>
                        <td>{{ $job->tipe }}</td>
                        <td>
                            @if($job->status === 'aktif')
                            <span class="badge bg-success">Aktif</span>
                            @else
                            <span class="badge bg-secondary">Nonaktif</span>
                            @endif
                        </td>
                        <td>
                            <form action="{{ route('jobs.destroy', $job->id) }}" method="POST"
                                onsubmit="return confirm('Hapus lowongan ini?')">
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
                        <td colspan="7" class="text-center text-muted">
                            Data lowongan belum tersedia
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            {{-- PAGINATION --}}
            <div class="mt-3">
                {{ $jobs->links() }}
            </div>
        </div>
    </div>

</div>
@endsection