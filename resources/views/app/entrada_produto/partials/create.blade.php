<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Realizar movimentacao de Mercadoria/Produtos') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Insira os dados para lançar quantidade em estoque.') }}
        </p>
    </header>
    <x-secondary-button class="abrir-modal">
        <span class="my-2">{{ __('Selecionar Produto') }}</span>
    </x-secondary-button>

    <form action="{{ route('mov_entrada.store') }}" method="post" class="mt-4 space-y-6" enctype="multipart/form-data">
        @csrf
        <div class="md:col-span-full grid grid-cols-1 md:grid-cols-6 gap-x-4">
            <div class="col-span-1 md:col-span-4 grid grid-cols-1 md:grid-cols-7 gap-x-4 gap-y-2">
                <div class="col-span-1">
                    <x-input-label for="mov_produto_id" :value="__('Produto ID')" />
                    <x-text-input id="mov_produto_id" name="mov_produto_id" type="text"
                        class="mt-1 w-full" />
                    <x-input-error :messages="$errors->updatePassword->get('mov_produto_id')" class="mt-2" />
                </div>
                <div class="col-span-6">
                    <x-input-label for="produto_descricao" :value="__('Descrição do Produto')" />
                    <x-text-input id="produto_descricao" name="produto_descricao" type="text" class="mt-1 w-full"
                        autocomplete="off" autofocus />
                    <x-input-error :messages="$errors->updatePassword->get('produto_descricao')" class="mt-2" />
                </div>
                <div class="col-span-3">
                    <x-input-label for="mov_quantidade" :value="__('Quantidade')" />
                    <x-text-input id="mov_quantidade" name="mov_quantidade" type="text"
                        class="mt-1 w-full" />
                    <x-input-error :messages="$errors->updatePassword->get('mov_quantidade')" class="mt-2" />
                </div>
                <div class="hidden col-span-3">
                    <x-input-label for="mov_tipo" :value="__('Tipo')" />
                    <x-text-input id="mov_tipo" name="mov_tipo" type="text"
                        class="mt-1 w-full" value="ENTRADA" />
                </div>
            </div>
            <div class="col-span-1 md:col-span-2">
                {{-- Imagem --}}
                <div class="md:col-span-full grid grid-cols-1 md:grid-cols-6 gap-x-4 gap-y-4">
                    <div class="md:col-span-full">
                        <div class="flex justify-center items-center gap-x-2">
                            <i class='bx bxs-image'></i>
                            <x-input-label for="produto_foto" :value="__('Foto do Produto')" />
                        </div>
                        <div class="flex flex-wrap justify-center gap-y-2">
                            <img id="imagem-preview" class="mborder rounded-lg object-contain w-40 h-40 p-1" />
                        </div>
                        <x-input-error :messages="$errors->updatePassword->get('produto_foto')" class="mt-2" />
                    </div>
                </div>
            </div>
        </div>
        <x-primary-button>
            {{ __('Registrar movimentacao de Produtos/Mercadoria') }}
        </x-primary-button>


    </form>
    @section('title_modal')
        <h2>Produtos cadastrados!</h2>
    @endsection
    @section('content_modal')
        <div class="p-4 ">
            <table class="w-full text-center">
                <tbody>
                    @foreach ($produtos as $produto)
                        @if ($produto->produto_foto)
                            <tr class="border hover:bg-gray-200 cursor-pointer"
                                onclick="SelecionarProduto({{ $produto->id }},'{{ $produto->produto_descricao }}','{{ asset('img/fotos_produtos/' . $produto->produto_foto) }}')">
                            @else
                            <tr class="border hover:bg-gray-200 cursor-pointer"
                                onclick="SelecionarProduto({{ $produto->id }},'{{ $produto->produto_descricao }}','{{ asset('Sem Imagem.png') }}')">
                        @endif
                        <td class=" align-center ">
                            @if ($produto->produto_foto)
                                <img id="imagem-preview" class="mx-auto border rounded-full object-contain w-16 h-16"
                                    src="{{ asset('img/fotos_produtos/' . $produto->produto_foto) }}" />
                            @else
                                <img id="imagem-preview" class="mx-auto border rounded-full object-contain w-16 h-16"
                                    src="{{ asset('Sem Imagem.png') }}" alt="Imagem Padrão">
                            @endif
                        </td>
                        <td class="">{{ $produto->id }}</td>
                        <td class="">{{ $produto->produto_descricao }}</td>
                        <td class="">{{ $produto->categoria->categoria_nome }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <script>
            function SelecionarProduto(id, produto_descricao, foto) {
                $("#mov_produto_id").val(id).prop('readonly', true);
                $("#produto_descricao").val(produto_descricao).prop('readonly', true);
                $("#imagem-preview").attr("src", foto);
                const modalContainer = document.querySelector('.modal-container');
                modalContainer.classList.toggle(
                    "hidden");
            }
        </script>
    @endsection


</section>
