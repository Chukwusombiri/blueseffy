<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-indigo-500 border border-transparent rounded-full font-semibold text-xs text-gray-100 uppercase tracking-widest hover:bg-indigo-600 focus:bg-indigo-700 active:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>