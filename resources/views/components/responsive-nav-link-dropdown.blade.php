<div x-data="{ open: false }" class="w-full" x-on:click.away="open=false">    
    <button x-on:click="open = ! open" class='w-full flex justify-between pl-3 py-2 border-l-4 
    border-transparent text-xs archivo-600 uppercase text-indigo-600 hover:text-indigo-800 
    hover:bg-gray-50 focus:outline-none focus:text-indigo-800 
    focus:bg-gray-50 transition'>
        {{$trigger}}
        <span :class="{'rotate-90' : open}">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                <path stroke-linecap="round" stroke-linejoin="round" d="M8.25 4.5l7.5 7.5-7.5 7.5" />
              </svg>              
        </span>
    </button>
    <ul x-show="open"x-transition:enter="transition ease-out duration-200"
    x-transition:enter-start="transform opacity-0 scale-95"
    x-transition:enter-end="transform opacity-100 scale-100"
    x-transition:leave="transition ease-in duration-75"
    x-transition:leave-start="transform opacity-100 scale-100"
    x-transition:leave-end="transform opacity-0 scale-95" class="w-full pl-5 border-y border-gray-300 divide-y divide-gray-200 space-y-2">
        {{$links}}
    </ul>
</div>