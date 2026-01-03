@extends('layouts.app')

@section('title', 'Absensi')

@section('content')
<div class="container">

    <h4 class="mb-3">🕒 Absensi Hari Ini</h4>

    <div class="card shadow-sm rounded-4">
        <div class="card-body">

            <p>
                Tanggal:
                <strong>{{ now()->translatedFormat('d F Y') }}</strong>
            </p>

            <p>
                Jam Sekarang:
                <strong id="clock"></strong>
            </p>

            @if(!$absensi)
                <form method="POST" action="{{ route('absensi.checkin') }}">
                    @csrf
                    <button class="btn btn-success">
                        Absen Masuk
                    </button>
                </form>
            @elseif(!$absensi->jam_keluar)
                <p>Jam Masuk: {{ $absensi->jam_masuk }}</p>

                <form method="POST" action="{{ route('absensi.checkout') }}">
                    @csrf
                    <button class="btn btn-danger">
                        Absen Pulang
                    </button>
                </form>
            @else
                <div class="alert alert-info">
                    Kamu sudah absen hari ini
                </div>
            @endif

        </div>
    </div>

</div>

<script>
    setInterval(() => {
        document.getElementById('clock').innerText =
            new Date().toLocaleTimeString();
    }, 1000);
</script>
@endsection
