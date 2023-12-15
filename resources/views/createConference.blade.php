<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Conference System</title>

    <link rel="stylesheet" href="{{ asset('assets/sass/styles.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet"/>
</head>
<body>

@php
    // Assuming you want to simulate an authenticated user in createConference.blade.php as well
    use App\Services\AuthSimulator;
    AuthSimulator::simulateAuthenticatedUser();
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark flicker-animation">
    <div class="container">
        <img src="{{ asset('assets/logo.jpg') }}" alt="Logo" width="150" height="50">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
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
        <h1>{{ __('messages.welcome') }} Admin</h1>
        <p>{{ __('messages.author') }}: Vygantas Jonaitis PIT-20-I-NT</p>
    </div>
    <div class="mt-4">
        <nav style="display: none;">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="btn btn-secondary" href="{{ route('home') }}">{{ __('nav.home') }}</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container mt-5">
        <h1>{{ __('Create Conference') }}</h1>
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        <form action="{{ route('storeConference') }}" method="post">
            @csrf

            <input type="hidden" name="id" value="{{ $conference['id'] }}">

            <div class="mb-3">
                <label for="title" class="form-label">{{ __('Title') }}:</label>
                <input type="text" name="title" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">{{ __('Description') }}:</label>
                <textarea name="description" class="form-control" required></textarea>
            </div>

            <div class="mb-3">
                <label for="place" class="form-label">{{ __('Place') }}:</label>
                <input type="text" name="place" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="start_date" class="form-label">{{ __('Start Date') }}:</label>
                <input type="datetime-local" name="start_date" class="form-control" required>
            </div>

            <div class="mb-3">
                <label for="end_date" class="form-label">{{ __('End Date') }}:</label>
                <input type="datetime-local" name="end_date" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">{{ __('Create Conference') }}</button>
        </form>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
