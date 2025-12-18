@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-xl-12 col-md-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Public Employee Directory</h6>
                </div>
                <div class="card-body">
                    <p>Welcome to the Public Employee Directory. You can search and view employee information.</p>
                    <a href="{{ route('guest.employees.index') }}" class="btn btn-primary">Browse Employees</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        @foreach(\App\Models\Employee::where('status', 'active')->take(6) as $employee)
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card shadow h-100">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                {{ $employee->name }}</div>
                            <div class="text-muted small">{{ $employee->position }}</div>
                            <div class="text-muted small">{{ $employee->department }}</div>
                            <span class="badge badge-success">Active</span>
                        </div>
                        <div class="col-auto">
                            @if($employee->photo)
                                <img src="{{ asset('storage/' . $employee->photo) }}" class="img-fluid rounded-circle" width="50" height="50" alt="Employee Photo">
                            @else
                                <img src="{{ asset('assets/img/avatars/1.png') }}" class="img-fluid rounded-circle" width="50" height="50" alt="Default Photo">
                            @endif
                        </div>
                    </div>
                    <div class="mt-2">
                        <a href="{{ route('guest.employees.show', $employee) }}" class="btn btn-sm btn-info">View Details</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
