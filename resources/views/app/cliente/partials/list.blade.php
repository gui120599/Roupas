<section>
    <header>
        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Todos produtos cadastrados!') }}
        </p>
    </header>
    <div class="flex flex-col mb-4">
        <x-text-input-buscar id="buscar" class="mt-3 mb-3 w-1/2" placeholder="Buscar"></x-text-input-buscar>
        <div class="flex gap-2 overflow-auto p-1">
    </div>
    <script>
        function scrollToElement(elementId) {
            var element = document.getElementById(elementId);

            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start',
                });
            }
        }
    </script>
</section>
