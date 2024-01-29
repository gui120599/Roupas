<nav class="bg-gradient-to-l from-gray-800 to-gray-900 border-b border-gray-100 transition duration-150 ease-in-out">
    <div class="flex flex-col justify-between h-screen nav-links">
        <div class="">
            <!-- Logo -->
            <div class="h-16 px-4 bg-pink-900 w-full flex flex-row items-center justify-between space-x-8 text-white text-2xl">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-16 w-auto fill-current text-gray-800 logo" />
                </a>
                <i class='bx bx-arrow-to-left cursor-pointer'></i>
            </div>

            <!-- Navigation Links -->
            <div class="p-4 space-y-8 flex flex-col">
                <x-nav-link class="flex items-center space-x-8" :href="route('produto')" :active="request()->routeIs('produto')">
                    <i class='bx bxs-badge-dollar'></i>
                    <span>{{ __('Vender') }}</span>
                </x-nav-link>
                <x-nav-link class="flex items-center space-x-8" :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    <i class='bx bxs-dashboard'></i>
                    <span>{{ __('Dashboard') }}</span>
                </x-nav-link>
                <x-nav-link class="flex items-center space-x-8" :href="route('categoria')" :active="request()->routeIs('categoria')">
                    <i class='bx bx-category-alt'></i>
                    <span>{{ __('Categorias') }}</span>
                </x-nav-link>
                <x-nav-link class="flex items-center space-x-8" :href="route('produto')" :active="request()->routeIs('produto')">
                    <i class='bx bxs-t-shirt'></i>
                    <span>{{ __('Produtos') }}</span>
                </x-nav-link>
                <x-nav-link class="flex items-center space-x-8" :href="route('produto')" :active="request()->routeIs('produto')">
                    <i class='bx bx-user' ></i>
                    <span>{{ __('Clientes') }}</span>
                </x-nav-link>
                @can('Admin')
                    <x-nav-link class="flex items-center space-x-8" :href="route('categoria')" :active="request()->routeIs('categoria')">
                        <i class='bx bx-user-pin'></i>
                        <span>{{ __('Usuários') }}</span>
                    </x-nav-link>
                @endcan
            </div>
        </div>

        <!-- Profile -->
        <div class="p-4 flex flex-col">
            <div class="flex items-center space-x-8">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-nav-link class="w- full flex items-center space-x-8" :href="route('logout')"
                        onclick="event.preventDefault(); this.closest('form').submit();">
                        <i class='bx bx-log-out-circle text-2xl'></i>
                        <span class="uppercase">{{ __('Sair do Sistema') }}</span>
                    </x-nav-link>
                </form>
            </div>
            <x-nav-link class="flex items-center space-x-8" :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                <i class='bx bx-user-circle text-2xl'></i>
                <span class="text-sm">{{ Auth::user()->name }}</span>
            </x-nav-link>
        </div>
    </div>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
          const arrowIcon = document.querySelector('.bx-arrow-to-left');
          const logo = document.querySelector('.logo');
          const navLinks = document.querySelectorAll('.nav-links span');
      
          arrowIcon.addEventListener('click', function() {
            logo.classList.toggle('hidden');
            navLinks.forEach(span => {
              span.classList.toggle('hidden');
              // Adicione ou remova outras classes conforme necessário
            });
            // Adicione ou remova outras classes conforme necessário para ajustar o tamanho vertical da navegação
          });
        });
      </script>
</nav>
