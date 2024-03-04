<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Nova Opção de Pagamento') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __('Insira os dados para a nova opção de pagamento.') }}
        </p>
    </header>

    <form action="{{ route('opcoes_pagamentos.store') }}" method="post" class="mt-6 space-y-6">
        @csrf

        <div>
            <x-input-label for="opcaopag_nome" :value="__('Nome da Opção de Pagamento')" />
            <x-text-input id="opcaopag_nome" name="opcaopag_nome" type="text" class="mt-1 w-full" value="{{ old('opcaopag_nome') }}" autocomplete="off" autofocus />
            <x-input-error :messages="$errors->get('opcaopag_nome')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="opcaopag_tipo_taxa" :value="__('Tipo de Taxa')" />
            <select id="opcaopag_tipo_taxa" name="opcaopag_tipo_taxa" class="mt-1 w-full border-gray-300 focus:border-black focus:ring-black rounded-md shadow-sm cursor-pointer">
                <option value="N/A" {{ old('opcaopag_tipo_taxa') == 'N/A' ? 'selected' : '' }}>N/A</option>
                <option value="DESCONTAR" {{ old('opcaopag_tipo_taxa') == 'DESCONTAR' ? 'selected' : '' }}>Descontar</option>
                <option value="ACRESCENTAR" {{ old('opcaopag_tipo_taxa') == 'ACRESCENTAR' ? 'selected' : '' }}>Acrecentar</option>
            </select>
            <x-input-error :messages="$errors->get('opcaopag_tipo_taxa')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="opcaopag_valor_percentual_taxa" :value="__('% Taxa')" />
            <x-text-input id="opcaopag_valor_percentual_taxa" name="opcaopag_valor_percentual_taxa" type="text" class="mt-1 w-full" value="{{ old('opcaopag_valor_percentual_taxa') }}" autocomplete="off" />
            <x-input-error :messages="$errors->get('opcaopag_valor_percentual_taxa')" class="mt-2" />
        </div>

        <x-primary-button>
            {{ __('Cadastrar Nova Opção de Pagamento') }}
        </x-primary-button>
    </form>
</section>
