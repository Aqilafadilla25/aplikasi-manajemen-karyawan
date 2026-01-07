<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Aplikasi Manajemen Karyawan')</title>

    {{-- Core CSS --}}
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/core.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/theme-default.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}">

    {{-- Helpers --}}
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>

    @stack('styles')
</head>

<body>

<div class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        {{-- SIDEBAR (HANYA JIKA LOGIN & TIDAK DIHIDE) --}}
        @if(auth()->check() && empty($hideSidebar))
            @include('layouts.sidebar')
        @endif

        <div class="layout-page">

            {{-- HEADER --}}
            @include('layouts.header')

            {{-- CONTENT --}}
            <div class="content-wrapper">
                <div class="container-xxl flex-grow-1 container-p-y">
                    @yield('content')
                </div>

                {{-- FOOTER --}}
                @include('layouts.footer')
            </div>

        </div>
    </div>
</div>

{{-- Core JS --}}
<script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>
<script src="{{ asset('assets/vendor/libs/bootstrap/bootstrap.bundle.js') }}"></script>
<script src="{{ asset('assets/vendor/js/menu.js') }}"></script>

{{-- SWEETALERT --}}
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

{{-- POPUP SUCCESS --}}
@if(session()->has('success'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ session('success') }}",
        timer: 2500,
        showConfirmButton: false
    });
</script>
@endif

{{-- POPUP ERROR (OPSIONAL, TAPI BAGUS) --}}
@if(session('error'))
<script>
    Swal.fire({
        icon: 'success',
        title: 'Berhasil',
        text: "{{ session('success') }}",
        timer: 2500,
        showConfirmButton: false
    });
</script>@endif

@stack('scripts')

<style>
.avatar-img {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    object-fit: cover;
}
</style>

</body>
</html>
