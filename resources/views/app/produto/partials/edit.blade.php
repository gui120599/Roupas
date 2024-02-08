<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Atualizar Produto') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Insira os dados para o produto.') }}
        </p>
    </header>

    <form action="{{ route('produto.update', ['produto'  => $produto]) }}" method="post" class="mt-6 space-y-6" enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="grid grid-cols-1 gap-x-4 gap-y-2 md:grid-cols-6">
            <div class="md:col-span-full grid grid-cols-1 md:grid-cols-6 gap-x-4 gap-y-4">
                <div class="col-span-1 md:col-span-4 space-y-3">
                    <div class="md:col-span-4">
                        <x-input-label for="produto_descricao" :value="__('Descrição do Produto')" />
                        <x-text-input id="produto_descricao" name="produto_descricao" type="text" class="mt-1 w-full"
                            autocomplete="off" autofocus />
                        <x-input-error :messages="$errors->updatePassword->get('produto_descricao')" class="mt-2" />
                    </div>
                    <div class="md:col-span-2">
                        <x-input-label for="produto_categoria_id" :value="__('Categoria do Produto')" />
                        <x-select-input :options="$categorias" value-field="id" display-field="categoria_nome"
                            id="produto_categoria_id" name="produto_categoria_id" class="mt-1 w-full" />
                        <x-input-error :messages="$errors->updatePassword->get('produto_categoria_id')" class="mt-2" />
                    </div>
                    <div class="md:col-span-3 grid grid-cols-1 sm:grid-cols-2 gap-x-4 gap-y-4">
                        <div class="">
                            <div class="flex items-center gap-x-2">
                                <i class='bx bx-barcode'></i>
                                <x-input-label for="produto_codigo_barras" :value="__('Código de Barras')" />
                            </div>
                            <x-text-input id="produto_codigo_barras" name="produto_codigo_barras" type="text"
                                class="mt-1 w-full" autocomplete="off" />
                            <x-input-error :messages="$errors->updatePassword->get('produto_codigo_barras')" class="mt-2" />
                        </div>

                        <div class="">
                            <x-input-label for="produto_referencia" :value="__('Referência do Produto')" />
                            <x-text-input id="produto_referencia" name="produto_referencia" type="text"
                                class="mt-1 w-full" autocomplete="off" />
                            <x-input-error :messages="$errors->updatePassword->get('produto_referencia')" class="mt-2" />
                        </div>
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
                                <x-text-input id="produto_foto" name="produto_foto" type="file"
                                    class="cursor-pointer p-1 w-64 " onchange="previewImage(this)" />
                            </div>
                            <x-input-error :messages="$errors->updatePassword->get('produto_foto')" class="mt-2" />
                        </div>
                    </div>
                </div>
            </div>

            {{-- Preços --}}
            <div class="col-span-full">
                <hr class="h-px my-1 border-0 bg-gray-200">
                <h2 class="flex items-center gap-x-2 text-lg font-bold text-teal-700">
                    <i class='bx bxs-dollar-circle'></i>
                    <span>{{ __('Preços') }}</span>
                </h2>
            </div>
            <div class="md:col-span-full grid grid-cols-1 md:grid-cols-6 gap-x-4 gap-y-4">
                <div class="lg:col-span-1 md:col-span-3">
                    <x-input-label for="produto_preco_custo" :value="__('Preço de Custo')" />
                    <x-money-input id="produto_preco_custo" name="produto_preco_custo" type="text"
                        class="mt-1 w-full" autocomplete="off" />
                    <x-input-error :messages="$errors->updatePassword->get('produto_preco_custo')" class="mt-2" />
                </div>

                <div class="lg:col-span-1 md:col-span-3">
                    <x-input-label for="produto_valor_percentual_venda" :value="__('Venda %')" />
                    <x-text-input id="produto_valor_percentual_venda" name="produto_valor_percentual_venda"
                        type="text" class="mt-1 w-full" autocomplete="off" />
                    <x-input-error :messages="$errors->updatePassword->get('produto_valor_percentual_venda')" class="mt-2" />
                </div>

                <div class="lg:col-span-1 md:col-span-3">
                    <x-input-label for="produto_preco_venda" :value="__('Preço de Venda')" />
                    <x-money-input id="produto_preco_venda" name="produto_preco_venda" type="text"
                        class="mt-1 w-full" autocomplete="off" />
                    <x-input-error :messages="$errors->updatePassword->get('produto_preco_venda')" class="mt-2" />
                </div>

                <div class="lg:col-span-1 md:col-span-3">
                    <x-input-label for="produto_valor_percentual_comissao" :value="__('Comissão %')" />
                    <x-text-input id="produto_valor_percentual_comissao" name="produto_valor_percentual_comissao"
                        type="text" class="mt-1 w-full" autocomplete="off" />
                    <x-input-error :messages="$errors->updatePassword->get('produto_valor_percentual_comissao')" class="mt-2" />
                </div>

                <div class="lg:col-span-1 md:col-span-3">
                    <x-input-label for="produto_preco_comissao" :value="__('Preço de Comissão')" />
                    <x-money-input id="produto_preco_comissao" name="produto_preco_comissao" type="text"
                        class="mt-1 w-full" autocomplete="off" />
                    <x-input-error :messages="$errors->updatePassword->get('produto_preco_comissao')" class="mt-2" />
                </div>

                <div class="lg:col-span-1 md:col-span-3">
                    <x-input-label for="produto_preco_promocional" :value="__('Preço Promocional')" />
                    <x-money-input id="produto_preco_promocional" name="produto_preco_promocional" type="text"
                        class="mt-1 w-full" autocomplete="off" />
                    <x-input-error :messages="$errors->updatePassword->get('produto_preco_promocional')" class="mt-2" />
                </div>
            </div>

            {{-- Promoção --}}
            <div class="col-span-full">
                <hr class="h-px my-1 border-0 bg-gray-200">
                <h2 class="flex items-center gap-x-2 text-lg font-bold text-teal-700">
                    <i class='bx bxs-badge-dollar'></i>
                    <span>{{ __('Promoção') }}</span>
                </h2>
            </div>
            <div class="md:col-span-full grid grid-cols-1 md:grid-cols-6 gap-x-4 gap-y-4">
                <div class="lg:col-span-2 md:col-span-3">
                    <x-input-label for="produto_data_inicio_promocao" :value="__('Data de Início da Promoção')" />
                    <x-date-input id="produto_data_inicio_promocao" name="produto_data_inicio_promocao"
                        class="mt-1 w-full" />
                    <x-input-error :messages="$errors->updatePassword->get('produto_data_inicio_promocao')" class="mt-2" />
                </div>

                <div class="lg:col-span-2 md:col-span-3">
                    <x-input-label for="produto_data_final_promocao" :value="__('Data de Fim da Promoção')" />
                    <x-date-input id="produto_data_final_promocao" name="produto_data_final_promocao"
                        class="mt-1 w-full" />
                    <x-input-error :messages="$errors->updatePassword->get('produto_data_final_promocao')" class="mt-2" />
                </div>
            </div>

            {{-- Máximos/Mínimos --}}
            <div class="col-span-full">
                <hr class="h-px my-1 border-0 bg-gray-200">
                <h2 class="flex items-center gap-x-2 text-lg font-bold text-teal-700">
                    <i class='bx bxs-message-square-error'></i>
                    <span>{{ __('Máximos/Mínimos') }}</span>
                </h2>
            </div>
            <div class="md:col-span-full grid grid-cols-1 md:grid-cols-6 gap-x-4 gap-y-4">
                <div class="lg:col-span-1 md:col-span-3">
                    <x-input-label for="produto_quantidade_minima" :value="__('Quantidade Mínima')" />
                    <x-text-input id="produto_quantidade_minima" name="produto_quantidade_minima" type="text"
                        class="mt-1 w-full" autocomplete="off" />
                    <x-input-error :messages="$errors->updatePassword->get('produto_quantidade_minima')" class="mt-2" />
                </div>

                <div class="lg:col-span-1 md:col-span-3">
                    <x-input-label for="produto_quantidade_maxima" :value="__('Quantidade Máxima')" />
                    <x-text-input id="produto_quantidade_maxima" name="produto_quantidade_maxima" type="text"
                        class="mt-1 w-full" autocomplete="off" />
                    <x-input-error :messages="$errors->updatePassword->get('produto_quantidade_maxima')" class="mt-2" />
                </div>
            </div>

            {{-- Quantidade em estoque --}}
            <div class="col-span-full">
                <hr class="h-px my-1 border-0 bg-gray-200">
                <h2 class="flex items-center gap-x-2 text-lg font-bold text-teal-700">
                    <i class='bx bxs-package'></i>
                    <span>{{ __('Quantidade em Estoque') }}</span>
                </h2>
            </div>
            <div class="md:col-span-full grid grid-cols-1 md:grid-cols-6 gap-x-4 gap-y-4">
                <div class="lg:col-span-1 md:col-span-3">
                    <x-input-label for="produto_quantidade_minima" :value="__('Quantidade')" />
                    <x-text-input id="produto_quantidade_minima" name="produto_quantidade" type="text"
                        class="mt-1 w-full" autocomplete="off" />
                    <x-input-error :messages="$errors->updatePassword->get('produto_quantidade')" class="mt-2" />
                </div>
            </div>

        </div>
        <x-primary-button>
            {{ __('Atualizar Produto') }}
        </x-primary-button>

    </form>
</section>
