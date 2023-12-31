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
            <h1>{{ __('Modify User') }}</h1>
            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('updateUser', ['id' => $user['id']]) }}" method="post">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="name" class="form-label">{{ __('Name') }}:</label>
                    <input type="text" name="name" value="{{ $user['name'] }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">{{ __('Email') }}:</label>
                    <input type="email" name="email" value="{{ $user['email'] }}" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">{{ __('Password') }}:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('Update User') }}</button>
            </form>
        </div>
</div>
@stop
