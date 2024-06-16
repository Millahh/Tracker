<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>Tracker</title>
        <link rel="shortcut icon" type="image/x-icon" href="{{ asset('icon.png') }}">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js', './node_modules/flowbite/dist/flowbite.min.js', './node_modules/flowbite/dist/datepicker.js'])
    </head>
    <body class="antialiased min-h-screen bg-custom bg-cover">
        <div class="">
            @include('layouts.sidebar')
            <!-- Page Content -->
            <main class="sm:ml-64">
                {{ $slot }}
                @session('success')
                    <x-alert-success-session/>
                @endsession
            </main>
        </div>
    </body>
</html>
