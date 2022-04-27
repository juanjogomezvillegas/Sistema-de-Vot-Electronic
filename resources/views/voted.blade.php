<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
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
        <section class="hero is-light is-fullheight">
            <div class="hero-body">
                <div class="container">
                    <h1 class="title is-1 has-text-centered">I Voted <i class="fa-solid fa-thumbs-up has-text-link is-size-1 ml-2"></i></h1>
                    <h1 class="title is-1 has-text-centered"><i class="fa-solid fa-check has-text-success is-size-1"></i></h1>
                </div>
            </div>
        </section>

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
