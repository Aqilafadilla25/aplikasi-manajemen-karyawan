@extends('layouts.app')
@section('title', 'Tambah Divisi')

@section('content')
<div class="container">
    <h4>Tambah Divisi</h4>

    <form action="{{ route('divisions.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Nama Divisi</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control"></textarea>
        </div>

        <button class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
