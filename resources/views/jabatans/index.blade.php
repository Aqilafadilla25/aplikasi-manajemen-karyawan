@extends('layouts.app')
@section('title', 'Data Jabatan')

@section('content')
<div class="container">

    {{-- HEADER + BUTTON --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Daftar Jabatan</h4>

        @if(in_array(auth()->user()->role, ['staff', 'admin']))
            <a href="{{ route('jabatans.create') }}" class="btn btn-primary btn-sm">
                Tambah Jabatan
            </a>
        @endif
    </div>

    {{-- FILTER & SEARCH --}}
    <form method="GET" class="mb-3 d-flex gap-2">
        <input
            type="text"
            name="search"
            class="form-control"
            placeholder="Cari nama jabatan..."
            value="{{ request('search') }}"
        >

        <select name="division_id" class="form-select">
            <option value="">-- Semua Divisi --</option>
            @foreach($divisions as $division)
                <option
                    value="{{ $division->id }}"
                    {{ request('division_id') == $division->id ? 'selected' : '' }}
                >
                    {{ $division->name }}
                </option>
            @endforeach
        </select>

        <button type="submit" class="btn btn-primary">
            Filter
        </button>
    </form>

    {{-- TABLE --}}
    <table class="table table-bordered align-middle">
        <thead class="table-light">
            <tr>
                <th width="5%">#</th>
                <th>Jabatan</th>
                <th>Divisi</th>
                <th width="20%">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jabatans as $jabatan)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $jabatan->nama_jabatan }}</td>
                    <td>{{ $jabatan->division->name }}</td>
                    <td class="d-flex gap-1">
                        {{-- EDIT --}}
                        @if(in_array(auth()->user()->role, ['staff', 'admin']))
                            <a
                                href="{{ route('jabatans.edit', $jabatan->id) }}"
                                class="btn btn-warning btn-sm"
                            >
                                Edit
                            </a>
                        @endif

                        {{-- HAPUS (ADMIN ONLY) --}}
                        @if(auth()->user()->role === 'admin')
                            <form
                                action="{{ route('jabatans.destroy', $jabatan->id) }}"
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
                        Data jabatan belum tersedia
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>

    {{-- PAGINATION --}}
    <div class="mt-4">
        {{ $jabatans->links() }}
    </div>

</div>
@endsection
