@extends('layouts.app')

@section('title', 'Tambah User')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">Tambah User</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('users.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Password</label>
                    <input type="password" name="password"
                           class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-select" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin">Admin</option>
                        <option value="staff">Staff</option>
                    </select>
                </div>

                <div class="text-end">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
                        Kembali
                    </a>
                    <button class="btn btn-primary btn-sm">
                        Simpan
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
