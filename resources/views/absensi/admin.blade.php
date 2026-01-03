@extends('layouts.app')

@section('title', 'Data Absensi')

@section('content')
<div class="container">

    <h4 class="mb-4">📋 Data Absensi Karyawan</h4>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Tanggal</th>
                <th>Masuk</th>
                <th>Pulang</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            @foreach($absensis as $a)
            <tr>
                <td>{{ $a->employee->nama }}</td>
                <td>{{ $a->employee->jabatan->nama }}</td>
                <td>{{ $a->tanggal }}</td>
                <td>{{ $a->jam_masuk ?? '-' }}</td>
                <td>{{ $a->jam_keluar ?? '-' }}</td>
                <td>{{ ucfirst($a->status) }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>
@endsection
