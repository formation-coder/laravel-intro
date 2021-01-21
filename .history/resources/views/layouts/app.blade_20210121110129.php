<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>La page principale :  @yield('title') </title>
    <style>


    </style>
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
</head>
<body>
    
    <nav>
        @if (Route::has('login'))
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ url('/home') }}" class="text-sm text-gray-700 underline">Home</a>
                <a href="{{ url('/logout') }}" class="text-sm text-gray-700 underline">Logout</a>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endauth
        </div>
        @endif
    </nav>

    @section('sidebar')
        C'est la barre principale (parent)
    @show

    <div class="container">
        @yield('content')
    </div>
    <footer>Kaupyraïthe moua</footer>
</body>
</html>