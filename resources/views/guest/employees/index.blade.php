@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1>Employee Directory</h1>
            <p>Search and browse employee information.</p>
        </div>
    </div>
    <div class="row mb-4">
        <div class="col-md-12">
            <form action="{{ route('guest.employees.index') }}" method="GET" class="d-flex">
                <input type="text" name="search" value="{{ request('search') }}" class="form-control me-2" placeholder="Search by name, position, or department">
                <button type="submit" class="btn btn-primary">Search</button>
            </form>
        </div>
    </div>
    <div class="row">
        @foreach($employees as $employee)
        <div class="col-md-6 mb-4">
            <div class="card">
                <div class="card-body">
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
                    <a href="{{ route('guest.employees.show', $employee->id) }}" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    {{ $employees->links() }}
</div>
@endsection
