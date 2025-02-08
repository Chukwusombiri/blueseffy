<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-indigo-600 dark:bg-blue-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-500 dark:hover:bg-blue-600 active:bg-indigo-700 dark:active:bg-blue-700 focus:outline-none focus:border-indigo-700 dark:focus:border-blue-700 focus:ring focus:ring-indigo-300 dark:focus:ring-blue-300 disabled:opacity-25 transition']) }}>
    {{ $slot }}
</button>
