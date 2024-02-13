<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Realizar Entrada de Mercadoria/Produtos') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Insira os dados para lançar qunatidade em estoque.') }}
        </p>
    </header>

    <form action="{{ route('categoria.store') }}" method="post" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="categoria_nome" :value="__('Nome do Categoria')" />
            <x-text-input id="categoria_nome" name="categoria_nome" type="text" class="mt-1 w-full" autocomplete="off" autofocus/>
            <x-input-error :messages="$errors->updatePassword->get('categoria_nome')" class="mt-2" />
        </div>
        <x-primary-button>
            {{ __('Registrar Entrada de Produtos/Mercadoria') }}
        </x-primary-button>

    </form>
    <x-modal name="meuModal" :show="false">
        <!-- Conteúdo do seu modal -->
        <div class="p-4">
            <h2 class="text-lg font-semibold">Título do Modal</h2>
            <p>Conteúdo do seu modal aqui.</p>
        </div>
    </x-modal>
    
    <script type="module">
        // Aguarde até que o documento esteja totalmente carregado
        $(document).ready(function() {
            // Esconder o modal quando o documento estiver pronto
            $('#meuModal').hide();
    
            // Abrir o modal quando um botão é clicado
            $('#abrirModal').click(function() {
                $('#meuModal').show();
            });
    
            // Fechar o modal quando um botão é clicado
            $('#fecharModal').click(function() {
                $('#meuModal').hide();
            });
        });
    </script>
    
    <!-- Botões para abrir e fechar o modal -->
    <button id="abrirModal">Abrir Modal</button>
    <button id="fecharModal">Fechar Modal</button>
    
    
</section>
