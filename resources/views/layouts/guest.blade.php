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
        @vite(['resources/css/app.css', 'resources/js/app.js', './node_modules/flowbite/dist/flowbite.min.js'])
    </head>
    <body class="font-sans antialiased bg-custom bg-cover">
        <div class="guest min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0">
            <div class=" sm:w-80 mt-6 px-6 py-4 shadow-md rounded-lg overflow-hidden bg-opacity-35 bg-white">
                <div class="w-36 mx-auto mb-7">
                    <x-application-logo/>
                </div>
                {{ $slot }}
            </div>
        </div>
    </body>
    @session('success')
        <x-alert-success-session/>
    @endsession
    @session('error')
        <x-alert-error-session/>
    @endsession
</html>
