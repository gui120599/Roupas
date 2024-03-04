<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight flex items-center space-x-2">
            <i class='bx bxs-t-shirt'></i>
            <a href="{{ route('opcoes_pagamentos') }}">{{ __('Opções de Pagamento') }}</a>
        </h2>
        <nav class="bg-transparent border-b border-gray-100">
            <!-- Primary Navigation Menu -->
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-center h-8">
                    <!-- Navigation Links -->
                    <div class="space-x-8 sm:ms-10 flex ">
                        <div class="section-list-link nav-link active cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-light leading-5 text-gray-500 hover:border-white focus:outline-none focus:text-white focus:border-white transition duration-150 ease-in-out"
                            data-section="section-list">
                            <div class="flex items-center">
                                <i class='bx bxs-package me-2'></i>
                                {{ __('Opções de Pagamento') }}
                            </div>
                        </div>

                        <div class="section-create-link nav-link cursor-pointer inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-light leading-5 text-gray-500 hover:border-white focus:outline-none focus:text-white focus:border-white transition duration-150 ease-in-out"
                            data-section="section-create">
                            <div class="flex items-center">
                                <i class='bx bx-plus me-2'></i>
                                {{ __('Cadastrar Opções de Pagamento') }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
    </x-slot>

    <div class="py-2">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg cadastrar-opcoes-pagamento-section section-create">
                <div class="w-full">
                    @include('app.opcoes_pagamentos.partials.create')
                </div>
            </div>

            <div class="p-4 bg-white shadow sm:rounded-lg opcoes-pagamento-section section-list">
                <div class="w-full">
                    @include('app.opcoes_pagamentos.partials.list')
                </div>
            </div>
        </div>
    </div>
    <style>
        .nav-link.active {
            color: rgb(20 184 166 / var(--tw-bg-opacity));
            border-bottom-color: rgb(20 184 166 / var(--tw-bg-opacity));
            font-weight: bold;
        }
    </style>
    <script type="module">
        $(document).ready(function() {
            // Oculta todas as seções ao carregar a página
            $('.cadastrar-opcoes-pagamento-section').hide();

            // Mostra a seção correspondente quando um link da navegação é clicado
            $('.nav-link').click(function() {
                var targetSection = $(this).data('section');

                // Oculta todas as seções e mostra apenas a correspondente
                $('.max-w-7xl .bg-white').hide();
                $('.' + targetSection).show();

                // Destaca visualmente o link ativo
                $('.nav-link').removeClass('active');
                $(this).addClass('active');
            });
        });
    </script>
</x-app-layout>
