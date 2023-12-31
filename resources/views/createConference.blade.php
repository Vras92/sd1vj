@extends('layouts.default')
@section('content')

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
@stop
