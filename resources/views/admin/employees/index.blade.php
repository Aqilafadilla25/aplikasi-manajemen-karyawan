@extends('layouts.app')

@section('content')
<<<<<<< HEAD
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Employee Management
                        <a href="{{ route('admin.employees.create') }}" class="btn btn-primary float-end">Add Employee</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>Department</th>
                                <th>Salary</th>
                                <th>Status</th>
                                <th>Photo</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($employees as $employee)
                            <tr>
                                <td>{{ $employee->id }}</td>
                                <td>{{ $employee->name }}</td>
                                <td>{{ $employee->position }}</td>
                                <td>{{ $employee->department }}</td>
                                <td>{{ $employee->salary }}</td>
                                <td>
                                    @if($employee->status == 'active')
                                        <span class="badge bg-success">Active</span>
                                    @elseif($employee->status == 'inactive')
                                        <span class="badge bg-danger">Inactive</span>
                                    @else
                                        <span class="badge bg-warning">On Leave</span>
                                    @endif
                                </td>
                                <td>
                                    @if($employee->photo)
                                        <img src="{{ asset('storage/' . $employee->photo) }}" width="50" height="50" alt="Photo">
                                    @else
                                        No Photo
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.employees.show', $employee->id) }}" class="btn btn-info btn-sm">View</a>
                                    <a href="{{ route('admin.employees.edit', $employee->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('admin.employees.destroy', $employee->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $employees->links() }}
                </div>
            </div>
        </div>
    </div>
=======
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
>>>>>>> 448fa31e99d3fefb055225e06c71d8e6a4cce79e
</div>
@endsection
