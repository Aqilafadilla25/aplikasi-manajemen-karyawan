@extends('layouts.app')
@section('title', 'Edit Divisi')

@section('content')
<div class="container">
    <h4>Edit Divisi</h4>

    <form action="{{ route('divisions.update', $division->id) }}" method="POST">
        @csrf @method('PUT')

        <div class="mb-3">
            <label>Nama Divisi</label>
            <input type="text" name="name"
                   value="{{ $division->name }}"
                   class="form-control" required>
        </div>

        <div class="mb-3">
            <label>Deskripsi</label>
            <textarea name="description"
                class="form-control">{{ $division->description }}</textarea>
        </div>

        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
