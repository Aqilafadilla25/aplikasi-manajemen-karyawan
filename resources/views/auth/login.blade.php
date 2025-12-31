@extends('layouts.auth')

@section('content')
<div class="container d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-6 col-lg-5">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-body p-4 p-md-5">

                <div class="text-center mb-4">
                    <img
                        src="{{ asset('assets/img/logo/logo_Nasywa2.png') }}"
                        alt="Logo"
                        style="height:200px; max-width:100%; object-fit:contain;">
                </div>

                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    {{-- EMAIL --}}
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input
                            type="email"
                            name="email"
                            class="form-control @error('email') is-invalid @enderror"
                            placeholder="example@email.com"
                            value="{{ old('email') }}"
                            required
                            autofocus>

                        @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- PASSWORD --}}
                    <div class="mb-4">
                        <label class="form-label">Password</label>
                        <input
                            type="password"
                            name="password"
                            class="form-control @error('password') is-invalid @enderror"
                            placeholder="********"
                            required>

                        @error('password')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- BUTTON --}}
                    <button type="submit" class="btn btn-primary w-100 mb-3">
                        Login
                    </button>

                    {{-- LINK REGISTER --}}
                    <p class="text-center mb-0">
                        Belum punya akun?
                        <a href="{{ route('register') }}" class="fw-semibold text-decoration-none">
                            Daftar di sini
                        </a>
                    </p>

                </form>

            </div>
        </div>
    </div>
</div>
@endsection