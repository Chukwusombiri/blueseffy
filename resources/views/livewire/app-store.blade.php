<div class="bg-white dark:bg-gray-800">
    <div class="flex justify-end pr-3 pt-3 pb-2">
        <button class="cursor-pointer outline-none" wire:click="$emit('closeModal')">
            <svg class="w-6 h-6 text-gray-800 dark:text-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
                <path d="M18 6l-12 12"></path>
                <path d="M6 6l12 12"></path>
            </svg>
        </button>
    </div>
    <div class="px-6 pb-6 pt-2">
        <h4 class="text-lg font-semibold text-gray-800 dark:text-gray-100 mb-2"> Sorry! {{ config('app.name') }} App is not
            yet available in your region.</h4>
        <p class="text-sm text-gray-600 dark:text-gray-400">Stay connected so as to get notified as soon as it becomes
            available in your region</p>
    </div>
</div>
