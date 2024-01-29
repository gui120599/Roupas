<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="icon" type="image/png" href="{{ asset('favicon.png') }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gradient-to-r from-rose-100 to-pink-100">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @if (isset($header))
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <footer class="max-w-7xl mx-auto p-7">
                <hr class="bg-gray-400 mb-7">
                <div class="flex justify-between">
                    <a href="/">
                        <img src="{{asset('img/LOGO APARADA ROSA.png')}}" alt="Arlete Moda Fashion" class="block h-6 w-auto fill-current">
                    </a>
                    <p class="text-gray-400">© 2024 {{ config('app.name', 'Laravel') }}</p>
                </div>
            </footer>
            <div>
                <x-toats></x-toats>
            </div>
        </div>
    </body>
</html>
