@extends('layouts.app')

@section('title', 'Edit User')

@section('content')
<div class="container py-4">
    <h4 class="mb-3">Edit User</h4>

    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('users.update', $user) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="name"
                           class="form-control"
                           value="{{ $user->name }}" required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email" name="email"
                           class="form-control"
                           value="{{ $user->email }}" required>
                </div>

                <div class="mb-3">
                    <label>Password (opsional)</label>
                    <input type="password" name="password"
                           class="form-control"
                           placeholder="Kosongkan jika tidak diubah">
                </div>

                <div class="mb-3">
                    <label>Role</label>
                    <select name="role" class="form-select" required>
                        <option value="admin" {{ $user->role === 'admin' ? 'selected' : '' }}>Admin</option>
                        <option value="staff" {{ $user->role === 'staff' ? 'selected' : '' }}>Staff</option>
                    </select>
                </div>

                <div class="text-end">
                    <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">
                        Kembali
                    </a>
                    <button class="btn btn-primary btn-sm">
                        Update
                    </button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection
