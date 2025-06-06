<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="icon" type="image/x-icon" href="{{ asset('graduation-cap-solid.svg') }}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
    </style>
    <title>@yield('title')</title>
</head>
<body>
@if (Auth::check())
    @include('layouts.navbar-login')
@elseif (Route::currentRouteName() === 'login' || Route::currentRouteName() === 'register' || Route::currentRouteName() === 'register-admin' )

@else
    @include('layouts.navbar')
@endif
    <main>
        @yield('content')
    </main>
</body>
</html>
