<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Produtos') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __('Todos produtos cadastrados!') }}
        </p>

    </header>
    <div class="flex flex-col mb-4">
        <x-text-input-buscar id="buscar" class="mt-3 mb-3 w-1/2" placeholder="Buscar"></x-text-input-buscar>
        <div class="flex gap-2 overflow-auto p-1">
            @foreach ($categorias as $categoria)
                <button
                    class="inline-flex items-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 disabled:opacity-25 transition ease-in-out duration-150"
                    onclick="scrollToElement('categoria_{{ $categoria->id }}')">
                    {{ $categoria->categoria_nome }}
                </button>
            @endforeach
        </div>
    </div>
    <div class="overflow-auto h-[20rem] sm:h-[18rem] lg:h-[38rem] snap-y">
        @foreach ($categorias as $categoria)
            <div class="mb-4" id="categoria_{{ $categoria->id }}">
                <h2 class="text-white text-lg font-bold">{{ $categoria->categoria_nome }}</h2>
                @if ($categoria->produtos->isEmpty())
                    <p class="text-gray-400">Não há produtos disponíveis nesta categoria.</p>
                @else
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-2 lg:grid-cols-3 gap-4 ">
                        @foreach ($categoria->produtos as $produto)
                            <div class="relative snap-end ">
                                <a href="{{ route('produto.show', ['produto' => $produto]) }}">
                                    <div
                                        class="w-full bg-zinc-800 p-2 rounded-lg flex items-start justify-between opacity-95 hover:opacity-100 gap-1">
                                        <div class="w-3/5 h-28 flex flex-col justify-between">
                                            <h2 class="text-white text-sm uppercase">{{ $produto->produto_nome }} -
                                                <span class="font-bold">{{ $produto->produto_tamanho }}</span></h2>
                                            <p
                                                class="text-gray-400 text-xs max-w-xl overflow-hidden whitespace-normal line-clamp-3">
                                                {{ $produto->produto_descricao }}
                                            </p>
                                            <div class="flex items-center">
                                                <span
                                                    class="text-white text-lg font-bold">R${{ str_replace('.', ',', $produto->produto_preco_venda) }}</span>
                                            </div>
                                        </div>
                                        <div class="w-2/5">
                                            <img src="{{ asset('img/fotos_produtos/' . $produto->produto_foto) }}"
                                                alt="{{ $produto->produto_nome }}"
                                                class="w-40 h-28 object-cover rounded-lg ">
                                        </div>
                                    </div>
                                </a>
                                <div class="absolute -bottom-2 right-5 inline-flex gap-2">
                                    <x-secondary-button
                                        onclick="window.location.href = '{{ route('produto.edit', ['produto' => $produto]) }}'">Editar</x-secondary-button>
                                    <form action="{{ route('produto.destroy', ['id' => $produto]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <x-danger-button>Excluir</x-danger-button>
                                    </form>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endif
            </div>
        @endforeach
    </div>
</section>
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
