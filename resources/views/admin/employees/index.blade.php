@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <h3 class="mb-3">Data Karyawan</h3>

    <a href="/admin/employees/create" class="btn btn-primary mb-3">
        + Tambah Karyawan
    </a>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>

        <tbody>
        @forelse ($employees as $index => $e)
            <tr>
                <td>{{ $employees->firstItem() + $index }}</td>
                <td>{{ $e->nama }}</td>
                <td>{{ $e->jabatan->nama_jabatan }}</td>
                <td>
                    <span class="badge bg-success">Aktif</span>
                </td>
                <td>
                    <a href="/admin/employees/{{ $e->id }}/edit"
                       class="btn btn-warning btn-sm">
                        Edit
                    </a>

                    <form action="/admin/employees/{{ $e->id }}"
                          method="POST"
                          class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger btn-sm"
                                onclick="return confirm('Yakin hapus data?')">
                            Hapus
                        </button>
                    </form>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="5" class="text-center">
                    Data karyawan belum tersedia
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>

    {{-- Pagination --}}
    {{ $employees->links() }}
</div>
@endsection
