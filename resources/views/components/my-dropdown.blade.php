<div class="relative inline-flex items-center px-1 transition border-b-2 border-transparent hover:border-indigo-400"
    x-data="{ open: false }" @click.away="open = false" @close.stop="open = false">    
        <button 
        x-on:click="open = ! open"
        type="button" class="w-full flex items-center gap-1 text-xs archivo-600 uppercase" id="menu-button"
            aria-expanded="true" aria-haspopup="true">
            {{ $trigger }}
            
            <svg class="h-4 w-4" x-bind:class="open && 'rotate-180' " xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
              <path d="M6 9l6 6l6 -6"></path>
            </svg>
        </button>    
    <div x-show="open" x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="transform opacity-0 scale-95" x-transition:enter-end="transform opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-75" x-transition:leave-start="transform opacity-100 scale-100"
        x-transition:leave-end="transform opacity-0 scale-95"
        class="absolute top-full -left-[50%] z-20 mt-2 w-56 divide-y divide-gray-100 border border-gray-300 rounded-md bg-white shadow-xl overflow-hidden"
        role="menu" aria-orientation="vertical" aria-labelledby="menu-button" tabindex="-1" style="display: none;"
        @click="open = false">
        {{ $content }}
    </div>
</div>
