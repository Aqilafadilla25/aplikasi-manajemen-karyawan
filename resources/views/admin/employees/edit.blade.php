@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Employee
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="name">Name</label>
                            <input type="text" name="name" value="{{ $employee->name }}" class="form-control" required>
                            @error('name') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="position">Position</label>
                            <input type="text" name="position" value="{{ $employee->position }}" class="form-control" required>
                            @error('position') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="department">Department</label>
                            <input type="text" name="department" value="{{ $employee->department }}" class="form-control" required>
                            @error('department') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="salary">Salary</label>
                            <input type="number" name="salary" step="0.01" value="{{ $employee->salary }}" class="form-control" required>
                            @error('salary') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="status">Status</label>
                            <select name="status" class="form-control" required>
                                <option value="active" {{ $employee->status == 'active' ? 'selected' : '' }}>Active</option>
                                <option value="inactive" {{ $employee->status == 'inactive' ? 'selected' : '' }}>Inactive</option>
                                <option value="on_leave" {{ $employee->status == 'on_leave' ? 'selected' : '' }}>On Leave</option>
                            </select>
                            @error('status') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <div class="mb-3">
                            <label for="photo">Photo</label>
                            <input type="file" name="photo" class="form-control" accept="image/*">
                            @if($employee->photo)
                                <img src="{{ asset('storage/' . $employee->photo) }}" width="100" height="100" alt="Current Photo">
                            @endif
                            @error('photo') <div class="text-danger">{{ $message }}</div> @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
