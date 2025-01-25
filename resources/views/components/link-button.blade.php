<a {{ $attributes->merge(['class' => 'inline-flex items-center px-4 py-2 bg-indigo-50 border border-transparent rounded-full font-semibold text-xs text-indigo-800 uppercase tracking-widest hover:bg-indigo-100 focus:bg-indigo-100 active:bg-indigo-300 shadow focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</a>