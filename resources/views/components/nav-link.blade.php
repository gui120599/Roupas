@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-1 pt-1 border-b-2 border-slate-950 text-sm font-bold leading-5 text-slate-950 focus:outline-none focus:border-slate-950 transition duration-150 ease-in-out'
            : 'inline-flex items-center px-1 pt-1 border-b-2 border-transparent text-sm font-medium leading-5 text-gray-700 hover:text-slate-950 hover:border-slate-950 focus:outline-none focus:text-slate-950 focus:border-slate-950 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
