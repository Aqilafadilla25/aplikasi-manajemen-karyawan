@extends('layouts.app')

@section('title', 'Dashboard Staff')

@section('content')
<h4 class="fw-bold mb-4">Dashboard Staff</h4>

<div class="row">
  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h6>Status Hari Ini</h6>
        <span class="badge bg-success">Hadir</span>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="card">
      <div class="card-body">
        <h6>Jam Masuk</h6>
        <p>08:05</p>
      </div>
    </div>
  </div>
</div>
@endsection
