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
    use App\Services\AuthSimulator;
    AuthSimulator::simulateAuthenticatedUser();
@endphp

<nav class="navbar navbar-expand-lg navbar-dark bg-dark flicker-animation">
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
        <h1>{{ __('messages.welcome') }} Client</h1>
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
        <h1>Conference Details</h1>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Place</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $conference['title'] }}</td>
                <td>{{ $conference['description'] }}</td>
                <td>{{ $conference['place'] }}</td>
                <td>{{ $conference['start_date'] }}</td>
                <td>{{ $conference['end_date'] }}</td>
                <td>
                    <form action="{{ route('registerConference', ['id' => $conference['id']]) }}" method="post" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Register</button>
                    </form>
                </td>
            </tr>
            </tbody>
        </table>
        <a href="{{ route('client') }}" class="btn btn-primary">Back to Conferences</a>
    </div>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
