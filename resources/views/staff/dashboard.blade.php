@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Staff Dashboard</h1>
            <p>Welcome to the Staff Dashboard. Here you can view employee information.</p>
        </div>
    </div>
    <div class="row">
        @foreach($employees as $employee)
        <div class="col-md-4 mb-4">
            <div class="card">
                <div class="card-body">
                    @if($employee->photo)
                        <img src="{{ asset('storage/' . $employee->photo) }}" class="card-img-top" alt="Employee Photo">
                    @endif
                    <h5 class="card-title">{{ $employee->name }}</h5>
                    <p class="card-text">
                        <strong>Position:</strong> {{ $employee->position }}<br>
                        <strong>Department:</strong> {{ $employee->department }}<br>
                        <strong>Status:</strong>
                        @if($employee->status == 'active')
                            <span class="badge bg-success">Active</span>
                        @elseif($employee->status == 'inactive')
                            <span class="badge bg-danger">Inactive</span>
                        @else
                            <span class="badge bg-warning">On Leave</span>
                        @endif
                    </p>
                    <a href="{{ route('staff.employees.show', $employee->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
