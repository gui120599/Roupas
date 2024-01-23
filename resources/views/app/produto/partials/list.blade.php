<section>
    <header>
        <div class="flex justify-between">
            <h2 class="text-lg font-medium text-gray-900">
                {{ __('Lista de Produtos') }}
            </h2>
            <x-primary-button onclick="window.location.href = '{{ route('produto.inactive') }}'">Mostrar
                Inativos</x-primary-button>
        </div>
    </header>
    <div class="w-[18rem] sm:w-[99%] overflow-auto mx-auto h-2/4">
        <table class="w-full text-center text-[7px] md:text-base">
            <thead class="">
                <tr class="border-b-4">
                    <th class="w-1/16">#</th>
                    <th class="w-4/6 px-1 md:px-4">Descrição</th>
                    <th class="w-1/8 px-1 md:px-4">Preço Venda</th>
                    <th class="w-1/8 px-1 md:px-4">Opções</th>
                </tr>
            </thead>
            <tbody>
                @if ($produtos->isEmpty())
                    <tr>
                        <td colspan="4" class="text-center py-4">Nenhum produto encontrado.</td>
                    </tr>
                @else
                    @foreach ($produtos as $produto)
                        <tr class="border-top border-gray-300">
                            <td>{{ $produto->id }}</td>
                            <td>{{ $produto->produto_descricao }}</td>
                            <td>{{ $produto->produto_preco_venda }}</td>
                            <td>
                                <div class="flex items-center justify-center space-x-2">
                                    <x-primary-button
                                        onclick="window.location.href = '{{ route('produto.edit', ['produto' => $produto]) }}'"
                                        title="Editar"><i class='bx bx-edit text-sm'></i></x-primary-button>
                                    <form action="{{ route('produto.destroy', ['id' => $produto]) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        <x-danger-button title="Excluir"><i
                                                class='bx bx-trash text-sm'></i></x-primary-button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
</section>
