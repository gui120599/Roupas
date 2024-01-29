<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Novo Produto') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Insira os dados para um novo produto.') }}
        </p>
    </header>

    <form action="{{ route('produto.store') }}" method="post" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf

        <div>
            <x-input-label for="produto_descricao" :value="__('Descrição do Produto')" />
            <x-text-input id="produto_descricao" name="produto_descricao" type="text" class="mt-1 w-full"
                autocomplete="off" autofocus />
            <x-input-error :messages="$errors->updatePassword->get('produto_descricao')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_codigo_barras" :value="__('Código de Barras')" />
            <x-text-input id="produto_codigo_barras" name="produto_codigo_barras" type="text" class="mt-1 w-full"
                autocomplete="off" />
            <x-input-error :messages="$errors->updatePassword->get('produto_codigo_barras')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_referencia" :value="__('Referência do Produto')" />
            <x-text-input id="produto_referencia" name="produto_referencia" type="text" class="mt-1 w-full"
                autocomplete="off" />
            <x-input-error :messages="$errors->updatePassword->get('produto_referencia')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_categoria_id" :value="__('Categoria do Produto')" />
            <x-select-input :options="$categorias" value-field="id" display-field="categoria_nome" id="produto_categoria_id"
                name="produto_categoria_id" class="mt-1 w-full" />
            <x-input-error :messages="$errors->updatePassword->get('produto_categoria_id')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_foto" :value="__('Foto do Produto')" />
            <div class="flex items-start justify-between w-full">
                <x-text-input id="produto_foto" name="produto_foto" type="file"
                    class="mt-1 max-w-full cursor-pointer" onchange="previewImage(this)" />
                <img id="imagem-preview" class=" ml-2 max-w-full border rounded-lg object-contain w-40 h-40" />
            </div>
            <x-input-error :messages="$errors->updatePassword->get('produto_foto')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_preco_custo" :value="__('Preço de Custo')" />
            <x-text-input id="produto_preco_custo" name="produto_preco_custo" type="text" class="mt-1 w-full"
                autocomplete="off" />
            <x-input-error :messages="$errors->updatePassword->get('produto_preco_custo')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_valor_percentual_venda" :value="__('Valor Percentual de Venda')" />
            <x-text-input id="produto_valor_percentual_venda" name="produto_valor_percentual_venda" type="text"
                class="mt-1 w-full" autocomplete="off" />
            <x-input-error :messages="$errors->updatePassword->get('produto_valor_percentual_venda')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_preco_venda" :value="__('Preço de Venda')" />
            <x-text-input id="produto_preco_venda" name="produto_preco_venda" type="text" class="mt-1 w-full"
                autocomplete="off" />
            <x-input-error :messages="$errors->updatePassword->get('produto_preco_venda')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_valor_percentual_comissao" :value="__('Valor Percentual de Comissão')" />
            <x-text-input id="produto_valor_percentual_comissao" name="produto_valor_percentual_comissao" type="text"
                class="mt-1 w-full" autocomplete="off" />
            <x-input-error :messages="$errors->updatePassword->get('produto_valor_percentual_comissao')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_preco_comissao" :value="__('Preço de Comissão')" />
            <x-text-input id="produto_preco_comissao" name="produto_preco_comissao" type="text" class="mt-1 w-full"
                autocomplete="off" />
            <x-input-error :messages="$errors->updatePassword->get('produto_preco_comissao')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_preco_promocional" :value="__('Preço Promocional')" />
            <x-text-input id="produto_preco_promocional" name="produto_preco_promocional" type="text"
                class="mt-1 w-full" autocomplete="off" />
            <x-input-error :messages="$errors->updatePassword->get('produto_preco_promocional')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_data_inicio_promocao" :value="__('Data de Início da Promoção')" />
            <x-date-input id="produto_data_inicio_promocao" name="produto_data_inicio_promocao" class="mt-1 w-full" />
            <x-input-error :messages="$errors->updatePassword->get('produto_data_inicio_promocao')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_data_final_promocao" :value="__('Data de Fim da Promoção')" />
            <x-date-input id="produto_data_final_promocao" name="produto_data_final_promocao" class="mt-1 w-full" />
            <x-input-error :messages="$errors->updatePassword->get('produto_data_final_promocao')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_quantidade_minima" :value="__('Quantidade Mínima')" />
            <x-text-input id="produto_quantidade_minima" name="produto_quantidade_minima" type="text"
                class="mt-1 w-full" autocomplete="off" />
            <x-input-error :messages="$errors->updatePassword->get('produto_quantidade_minima')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="produto_quantidade_maxima" :value="__('Quantidade Máxima')" />
            <x-text-input id="produto_quantidade_maxima" name="produto_quantidade_maxima" type="text"
                class="mt-1 w-full" autocomplete="off" />
            <x-input-error :messages="$errors->updatePassword->get('produto_quantidade_maxima')" class="mt-2" />
        </div>

        <x-primary-button>
            {{ __('Cadastrar Novo Produto') }}
        </x-primary-button>
    </form>
    <script>
        function previewImage(input) {
            var preview = document.getElementById('imagem-preview');
            var file = input.files[0];
            var reader = new FileReader();

            reader.onloadend = function() {
                preview.src = reader.result;
            }

            if (file) {
                reader.readAsDataURL(file);
            } else {
                preview.src = "";
            }
        }
    </script>
</section>
