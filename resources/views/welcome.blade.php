<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ config('app.name', 'Employee Management System') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-body text-center">
                        <h1 class="card-title mb-4">Welcome to Employee Management System</h1>
                        <p class="card-text mb-4">
                            Manage your employees efficiently with our comprehensive system.
                            Access different features based on your role: Admin, Staff, or Guest.
                        </p>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                            @if (Route::has('login'))
                                <a href="{{ route('login') }}" class="btn btn-primary btn-lg me-md-2">Login</a>
                            @endif
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="btn btn-outline-primary btn-lg">Register</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
