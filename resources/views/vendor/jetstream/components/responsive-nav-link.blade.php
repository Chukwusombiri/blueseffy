@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block pl-3 py-2 border-l-4 border-indigo-400 text-xs uppercase archivo-600 text-indigo-700 dark:text-gray-50 bg-indigo-50 dark:bg-gray-600 focus:outline-none focus:text-indigo-800 dark:focus:text-gray-50 focus:bg-indigo-50 dark:focus:bg-gray-600 focus:border-indigo-400 transition'
            : 'block pl-3 py-2 border-l-4 border-transparent text-xs uppercase archivo-600 text-indigo-600 dark:text-gray-100 hover:text-indigo-800 dark:hover:text-gray-50 dark:hover:bg-gray-600 hover:bg-gray-50 focus:outline-none focus:text-gray-800 dark:focus:text-gray-50 focus:bg-gray-50 dark:focus:bg-gray-600 transition';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
