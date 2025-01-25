@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 py-2 border-l-4 border-indigo-400 text-xs uppercase archivo-600 text-indigo-700 bg-indigo-50 focus:outline-none focus:text-indigo-800 focus:bg-indigo-50 focus:border-indigo-400 transition'
            : 'block pl-3 py-2 border-l-4 border-transparent text-xs uppercase archivo-600 text-indigo-600 hover:text-indigo-800 hover:bg-gray-50 focus:outline-none focus:text-gray-800 focus:bg-gray-50 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
