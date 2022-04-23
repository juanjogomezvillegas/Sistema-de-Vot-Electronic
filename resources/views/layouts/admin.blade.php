<!DOCTYPE html>
{{-- {{ str_replace('_', '-', app()->getLocale()) }} --}}
<html lang="ca" class="has-background-black">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="author" content="Juan José Gómez Villegas">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" href="{{ session('config')['logo'] }}">
        <title>{{ session('config')['title'] }}</title>

        <!-- Fonts -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

        <!-- Styles -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>
        @include('includes.navbaradmin')

        <div id="app">
            @yield('content')
        </div>

        <!-- Scripts -->
        <script src="js/chart.js"></script>
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
