@extends('layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
<h4 class="fw-bold mb-4">Dashboard Admin</h4>

<div class="row">
  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h6>Total Karyawan</h6>
        <h3>120</h3>
      </div>
    </div>
  </div>

  <div class="col-md-3">
    <div class="card">
      <div class="card-body">
        <h6>Total Divisi</h6>
        <h3>8</h3>
      </div>
    </div>
  </div>
</div>
@endsection
