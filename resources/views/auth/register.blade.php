@extends('layouts.auth')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-7 col-lg-6">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4 p-md-5">

                {{-- LOGO --}}
                <div class="text-center mb-4">
                    <img
                        src="{{ asset('assets/img/logo/logo_Nasywa2.png') }}"
                        alt="Logo"
                        style="height:200px; max-width:100%; object-fit:contain;"
                    >
                </div>

                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    {{-- ROLE (AUTO STAFF) --}}
                    <input type="hidden" name="role" value="staff">

                    {{-- NAMA --}}
                    <div class="mb-3">
                        <label class="form-label">Nama Lengkap</label>
                        <input
                            type="text"
                            name="name"
                            class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}"
                            required
                        >
                        @error('name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- EMAIL --}}
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            value="{{ old('email') }}"
                            required
                        >
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-3">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            required
                        >
                        @error('password')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- KONFIRMASI PASSWORD --}}
                    <div class="mb-4">
                        <label class="form-label">Konfirmasi Password</label>
                        <input
                            type="password"
                            name="password_confirmation"
                            class="form-control"
                            required
                        >
                    </div>

                    {{-- BUTTON --}}
                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        Register
                    </button>

                    {{-- LINK LOGIN --}}
                    <p class="text-center mb-0">
                        Sudah punya akun?
                        <a href="{{ route('login') }}" class="fw-semibold text-decoration-none">
                            Login di sini
                        </a>
                    </p>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
