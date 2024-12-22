<!DOCTYPE html>
<html lang="en" class="h-full bg-gray-900 dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About</title>
    @vite(['resources/css/app.css','resources/js/app.js'])
    <link rel="stylesheet" href="https://rsms.me/inter/inter.css">
<body class="text-white">
    
    @auth
        @if (auth()->user()->role == 'musician')
            <x-navbar-musician></x-navbar-musician>
        @elseif (auth()->user()->role == 'cafeOwner')
            <x-navbarcafe-owner></x-navbarcafe-owner>
        @endif    
    @endauth

    @guest
        <x-navbar></x-navbar>
    @endguest

    <div class="mt-28">
        
        {{$content}}

    </div>
    <x-footer></x-footer>
</body>
</html>