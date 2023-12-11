<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conference System</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
</head>
<body>

@php
    // Simulate an authenticated user
    $user = ['name' => 'Vygantas Jonaitis'];
    app()->instance('user', $user);
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <img src="{{ asset('assets/logo.jpg') }}" alt="Logo" width="150" height="50">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="navbar-text ms-auto">
                <span class="text-white">{{ app('user')['name'] }}</span>
                <button class="btn btn-outline-danger ms-2" disabled>Logout</button>
            </div>
        </div>
    </div>
</nav>

<div class="container mt-5">
    <div>
        <h1>Vygantas Jonaitis PIT-20-I-NT </h1>
    </div>
    <div class="mt-4">
        <nav>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="btn btn-secondary" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn btn-secondary" href="{{ route('client') }}">Client Management</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn btn-secondary" href="{{ route('employee') }}">Employee Management</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn btn-secondary" href="{{ route('admin') }}">Admin Management</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn btn-secondary" href="{{ route('adminUser') }}">Admin User Management</a>
                </li>
            </ul>
        </nav>
    </div>

</div>

<!-- Include Bootstrap JS (Optional, if you need Bootstrap JavaScript features) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
