@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center  px-1 pt-1 border-b-2 border-gray-800 text-sm font-bold leading-5 text-gray-800 focus:outline-none focus:border-white transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-light leading-5 text-gray-500 hover:border-white focus:outline-none focus:text-white focus:border-white transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
