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
