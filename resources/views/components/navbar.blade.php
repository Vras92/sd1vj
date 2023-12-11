<nav class="bg-gray-800 p-4">
    <div class="flex items-center justify-between">
        @if(app()->bound('user'))
            <div class="flex items-center">
                <div class="text-white mr-4">{{ app('user')['name'] }}</div>
                <div class="mr-3">
                    <button class="text-white bg-blue-500 px-3 py-1 rounded" disabled>Logout</button>
                </div>
            </div>
        @endif
    </div>
</nav>
