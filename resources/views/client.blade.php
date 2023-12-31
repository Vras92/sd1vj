@extends('layouts.default')
@section('content')

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
        <h1>Conference List</h1>
        <div class="container mt-5">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Place</th>
                    <th scope="col">Start Date</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($conferences as $conference)
                    <tr>
                        <td>{{ $conference['title'] }}</td>
                        <td>{{ $conference['place'] }}</td>
                        <td>{{ $conference['start_date'] }}</td>
                        <td>
                            <a href="{{ route('viewConference', ['id' => $conference['id']]) }}" class="btn btn-primary">View</a>
                            <form action="{{ route('registerConference', ['id' => $conference['id']]) }}" method="post" style="display: inline;">
                                @csrf
                                <button type="submit" class="btn btn-success">Register</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
