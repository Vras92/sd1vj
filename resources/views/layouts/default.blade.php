<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<html>
<head>
    @include('includes.head')
</head>
<body>

@php
    use App\Services\AuthSimulator;
    AuthSimulator::simulateAuthenticatedUser();
@endphp

<div class="container">
    <header class="row">
        @include('includes.header')
    </header>
    <div id="main" class="row">
        @yield('content')
    </div>
    <footer class="row">
        @include('includes.footer')
    </footer>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="{{ asset('assets/js/scripts.js') }}"></script>
</body>
</html>
