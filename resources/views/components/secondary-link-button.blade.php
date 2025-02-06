<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-blue-500 border border-transparent rounded-full font-semibold text-xs text-gray-100 uppercase tracking-widest hover:bg-indigo-700 dark:hover:bg-blue-700 focus:bg-indigo-700 dark:focus:bg-blue-700 active:bg-indigo-700 dark:active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-indigo-600 dark:focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>