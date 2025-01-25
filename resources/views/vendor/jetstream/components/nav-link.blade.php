@props(['active'])

@php
$classes = ($active ?? false)
            ? 'archivo-600 inline-flex items-center px-1 uppercase border-b-2 border-indigo-400 text-xs font-semibold leading-5 text-gray-500 focus:outline-none focus:border-indigo-700 transition duration-150 ease-in-out'
            : 'archivo-600 inline-flex items-center px-1 uppercase border-b-2 border-transparent text-xs font-semibold leading-5 text-gray-800 hover:text-gray-600 hover:border-indigo-400 focus:outline-none focus:text-gray-500 focus:border-indigo-700 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
