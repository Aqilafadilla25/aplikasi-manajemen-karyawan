@extends('layouts.app')
@section('title', 'Tambah Lowongan')

@section('content')
<div class="container">

    {{-- HEADER --}}
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4 class="mb-0">Tambah Lowongan Pekerjaan</h4>
        <a href="{{ route('jobs.index') }}" class="btn btn-secondary btn-sm">
            Kembali
        </a>
    </div>

    {{-- FORM --}}
    <div class="card">
        <div class="card-body">
            <form method="POST" action="{{ route('jobs.store') }}">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Judul Lowongan</label>
                    <input type="text" name="judul" class="form-control" required>
                </div>

                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label">Divisi</label>
                        <input type="text" name="divisi" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Lokasi</label>
                        <input type="text" name="lokasi" class="form-control" required>
                    </div>

                    <div class="col-md-4 mb-3">
                        <label class="form-label">Tipe Pekerjaan</label>
                        <select name="tipe" class="form-select" required>
                            <option value="Full-time">Full-time</option>
                            <option value="Part-time">Part-time</option>
                            <option value="Magang">Magang</option>
                        </select>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label">Deskripsi</label>
                    <textarea name="deskripsi" rows="4" class="form-control" required></textarea>
                </div>

                <div class="text-end">
                    <button class="btn btn-success">
                        Simpan Lowongan
                    </button>
                </div>
            </form>
        </div>
    </div>

</div>
@endsection
