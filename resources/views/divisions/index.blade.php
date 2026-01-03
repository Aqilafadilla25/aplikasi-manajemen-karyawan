@extends('layouts.app')
@section('title', 'Data Divisi')

@section('content')
<div class="container">

    {{-- HEADER + BUTTON --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">Daftar Divisi</h4>

        @if(in_array(auth()->user()->role, ['staff', 'admin']))
            <a href="{{ route('divisions.create') }}" class="btn btn-primary btn-sm">
                <i class="ri-add-line"></i> Tambah Divisi
            </a>
        @endif
    </div>

    {{-- SEARCH --}}
    <form method="GET" class="mb-3 d-flex gap-2">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari nama divisi..."
            value="{{ request('search') }}"
        >

        <button type="submit" class="btn btn-primary">
            Cari
        </button>
    </form>

    {{-- TABLE --}}
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th width="5%">#</th>
                <th>Nama Divisi</th>
                <th>Deskripsi</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($divisions as $division)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $division->name }}</td>
                    <td>{{ $division->description }}</td>
                    <td class="d-flex gap-1">
                        {{-- EDIT --}}
                        @if(in_array(auth()->user()->role, ['staff', 'admin']))
                            <a
                                href="{{ route('divisions.edit', $division->id) }}"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>
                        @endif

                        {{-- DELETE (ADMIN ONLY) --}}
                        @if(auth()->user()->role === 'admin')
                            <form
                                action="{{ route('divisions.destroy', $division->id) }}"
                                method="POST"
                                onsubmit="return confirm('Apakah yakin ingin menghapus?');"
                            >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    Hapus
                                </button>
                            </form>
                        @endif
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4" class="text-center text-muted">
                        Data tidak ditemukan
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $divisions->links() }}
    </div>

</div>
@endsection
