@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center px-4 py-3 text-sm font-medium rounded-xl bg-indigo-600/10 text-indigo-400 border-l-4 border-indigo-500 transition-colors duration-150 ease-in-out'
            : 'flex items-center px-4 py-3 text-sm font-medium rounded-xl text-slate-400 border-l-4 border-transparent hover:bg-slate-800 hover:text-slate-200 transition-colors duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
