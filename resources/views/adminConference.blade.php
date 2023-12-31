@extends('layouts.default')
@section('content')

    <div class="container mt-5">
    <div>
        <h1>{{ __('messages.welcome') }} Admin</h1>
        <p>{{ __('messages.author') }}: Vygantas Jonaitis PIT-20-I-NT</p>
    </div>
    <div class="mt-4">
        <nav>
            <ul class="nav flex-column">
                <li class="nav-item mb-2">
                    <a class="btn btn-secondary" href="{{ route('home') }}">{{ __('nav.home') }}</a>
                </li>
                <li class="nav-item mb-2">
                    <a class="btn btn-primary" href="{{ route('createConference') }}">Create New Conference</a>
                </li>
            </ul>
        </nav>
    </div>

    <div class="container mt-5">
        <h1>{{ __('messages.conferenceList') }}</h1>

        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-striped">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Title</th>
                <th scope="col">Description</th>
                <th scope="col">Place</th>
                <th scope="col">Start Date</th>
                <th scope="col">End Date</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($conferences as $conference)
                <tr>
                    <td>{{ $conference['id'] }}</td>
                    <td>{{ $conference['title'] }}</td>
                    <td>{{ $conference['description'] }}</td>
                    <td>{{ $conference['place'] }}</td>
                    <td>{{ $conference['start_date'] }}</td>
                    <td>{{ $conference['end_date'] }}</td>
                    <td>
                        <a href="{{ route('modifyConference', ['id' => $conference['id']]) }}" class="btn btn-primary">Modify</a>

                        <form action="{{ route('deleteConference', ['id' => $conference['id']]) }}" method="post" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure ?')">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            </tbody>
        </table>
    </div>
</div>
@stop
