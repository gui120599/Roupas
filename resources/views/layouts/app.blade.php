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
    <div class="flex h-screen bg-gray-200">
        <!-- Barra lateral -->
        <div class="sidebar md:block top-0 bottom-0 lg:left-0 p-2 w-[300px] overflow-y-auto text-center bg-gray-900 transition-width ease-in-out duration-300">
            @include('layouts.navigation2')
        </div>

        <!-- Conteúdo principal -->
        <div class="flex flex-col flex-1 overflow-hidden transition-margin ease-in-out duration-300">
            <!-- Barra de navegação superior fixa -->
            @if (isset($header))
                <header class="bg-transparent">
                    <div class="h-16 max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8 ">
                        {{ $header }}
                    </div>
                </header>
            @endif

            <!-- Page Content -->
            <main class="flex-1 overflow-x-hidden overflow-y-auto bg-gray-200 transition-margin ease-in-out duration-300">
                <div class="container mx-auto px-6 py-8">
                    {{ $slot }}
                </div>
            </main>
            <div>
                <x-toats></x-toats>
            </div>
        </div>
    </div>

    <script>
        function updateSidebarPosition() {
            const sidebar = document.querySelector('.sidebar');
            const isMd = window.matchMedia("(min-width: 768px)").matches;

            if (isMd) {
                sidebar.classList.remove('fixed');
            } else {
                sidebar.classList.add('fixed');
            }
        }

        // Chama a função ao carregar a página e redimensionar a tela
        window.addEventListener('load', updateSidebarPosition);
        window.addEventListener('resize', updateSidebarPosition);
    </script>
</body>


</html>
