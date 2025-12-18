@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Employee Details
                        <a href="{{ route('staff.employees.index') }}" class="btn btn-danger float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            @if($employee->photo)
                                <img src="{{ asset('storage/' . $employee->photo) }}" class="img-fluid" alt="Employee Photo">
                            @else
                                <p>No photo available</p>
                            @endif
                        </div>
                        <div class="col-md-8">
                            <h3>{{ $employee->name }}</h3>
                            <p><strong>Position:</strong> {{ $employee->position }}</p>
                            <p><strong>Department:</strong> {{ $employee->department }}</p>
                            <p><strong>Salary:</strong> ${{ number_format($employee->salary, 2) }}</p>
                            <p><strong>Status:</strong>
                                @if($employee->status == 'active')
                                    <span class="badge bg-success">Active</span>
                                @elseif($employee->status == 'inactive')
                                    <span class="badge bg-danger">Inactive</span>
                                @else
                                    <span class="badge bg-warning">On Leave</span>
                                @endif
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
