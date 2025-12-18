@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Employee Details') }}</div>

                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($employee->photo)
                                <img src="{{ asset('storage/' . $employee->photo) }}" class="img-fluid rounded" alt="Employee Photo">
                            @else
                                <img src="{{ asset('assets/img/avatars/1.png') }}" class="img-fluid rounded" alt="Default Photo">
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h4>{{ $employee->name }}</h4>
                            <p><strong>Position:</strong> {{ $employee->position }}</p>
                            <p><strong>Department:</strong> {{ $employee->department }}</p>
                            <p><strong>Salary:</strong> Rp {{ number_format($employee->salary, 0, ',', '.') }}</p>
                            <p><strong>Status:</strong>
                                @if($employee->status == 'active')
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">Inactive</span>
                                @endif
                            </p>
                            <p><strong>Created At:</strong> {{ $employee->created_at->format('d M Y') }}</p>
                        </div>
                    </div>

                    <div class="mt-3">
                        <a href="{{ route('admin.employees.edit', $employee) }}" class="btn btn-warning">Edit</a>
                        <a href="{{ route('admin.employees.index') }}" class="btn btn-secondary">Back to List</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
