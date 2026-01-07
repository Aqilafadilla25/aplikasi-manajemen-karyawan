@extends('layouts.app')

@section('title', 'Manajemen User')

@section('content')
<div class="container py-4">

    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Manajemen User</h4>
        <a href="{{ route('users.create') }}" class="btn btn-primary btn-sm">
            + Tambah User
        </a>
    </div>

    <form method="GET" class="row g-2 mb-3">

    <div class="col-md-4">
        <input type="text" name="search" class="form-control"
            placeholder="Cari nama atau email..."
            value="{{ $search }}">
    </div>

    <div class="col-md-3">
        <select name="role" class="form-select">
            <option value="">Semua Role</option>
            <option value="admin" {{ request('role') == 'admin' ? 'selected' : '' }}>Admin</option>
            <option value="staff" {{ request('role') == 'staff' ? 'selected' : '' }}>Staff</option>
            <option value="guest" {{ request('role') == 'guest' ? 'selected' : '' }}>Guest</option>
        </select>
    </div>

    <div class="col-md-3 d-flex gap-2">
        <button class="btn btn-primary btn-sm">Filter</button>
        <a href="{{ route('users.index') }}" class="btn btn-secondary btn-sm">Reset</a>
    </div>

</form>


    @if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body p-0">
            <table class="table table-hover mb-0">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th width="140">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                    <tr>
                        <td>{{ $loop->iteration + $users->firstItem() - 1 }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>
                            <span class="badge bg-{{ $user->role === 'admin' ? 'primary' : 'secondary' }}">
                                {{ strtoupper($user->role) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="{{ route('users.edit', $user) }}"
                                    class="btn btn-warning btn-sm px-3">
                                    Edit
                                </a>

                                <form action="{{ route('users.destroy', $user) }}"
                                    method="POST"
                                    onsubmit="return confirm('Hapus user ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm px-3">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </td>

                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-3">
                            Data user kosong
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="mt-5">
        {{ $users->links() }}
    </div>

</div>
@endsection