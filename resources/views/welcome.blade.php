@extends('layouts.default')
@section('content')

<div class="container mt-5">
    <div>
        <h1>{{ __('messages.welcome') }}</h1>
        <p>{{ __('messages.author') }}: Vygantas Jonaitis PIT-20-I-NT</p>
    </div>
    <div class="mt-4">
        <nav style="display: none;">
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="btn btn-secondary" href="{{ route('home') }}">{{ __('nav.home') }}</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn btn-secondary" href="{{ route('client') }}">{{ __('nav.client_management') }}</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn btn-secondary" href="{{ route('employee') }}">{{ __('nav.employee_management') }}</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn btn-secondary" href="{{ route('admin') }}">{{ __('nav.admin_management') }}</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@stop
