<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TMDB Movies</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">
    <nav class="bg-white shadow">
        <div class="container mx-auto px-6 py-3">
            <div class="flex justify-between items-center">
                <div>
                    <a class="text-xl font-bold text-gray-800 hover:text-gray-700" href="{{ url('/') }}">Home</a>
                </div>
                <div class="flex items-center space-x-4">
                    @if (Route::has('login'))
                        @auth
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="text-gray-800 hover:text-gray-700">Logout</button>
                            </form>
                        @else
                            <a class="text-gray-800 hover:text-gray-700" href="{{ route('login') }}">Login</a>
                            @if (Route::has('register'))
                                <a class="text-gray-800 hover:text-gray-700" href="{{ route('register') }}">Register</a>
                            @endif
                        @endauth
                    @endif
                </div>
            </div>
        </div>
    </nav>

    <main class="py-8">
        @yield('content')
    </main>

    <script src="{{ mix('js/app.js') }}"></script>
    @livewireScripts
</body>
</html>
