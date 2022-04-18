<!DOCTYPE html>
<html lang="ca">
    <head>
        <meta charset="UTF-8">
        <meta name="description" content="Election.daw is a electronic voting system">
        <meta name="keywords" content="election election.daw electronic voting system">
        <meta name="author" content="Juan José Gómez Villegas">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ session('config')['icon'] }}">
        <title>{{ session('config')['title'] }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        @include('includes.navbar')

        <div id="app">
            @yield('content')
        </div>

        @include('includes.footer')

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
