<div class="bg-white dark:bg-gray-900 pt-10 px-4">
    <h2 class="text-center capitalize font-semibold text-lg mb-3 text-gray-700 dark:text-gray-200">Add new wallet</h2>
    @if (session()->has('result'))
        <p class="text-red-600 mb-2">
            {{ session('result') }}
        </p>
    @endif
    <div class="mb-2">
        <x-jet-label for="name" value="Wallet name"/>
        <x-jet-input type="text" id="name" wire:model="name" class="mt-1 block w-full" placeholder="Type wallet name..." />
        <x-jet-input-error for="name" />
    </div>

    <div class="mb-4">
        <x-jet-label for="address" value="Wallet address"/>
        <x-jet-input type="text" id="address" wire:model="address" class="mt-1 block w-full" placeholder="Type wallet address..." />
        <x-jet-input-error for="address" />        
    </div>
    <div class="flex items-center gap-4 justify-end px-2 pb-4">
        <button wire:click="$emit('closeModal')" class="bg-slate-500 hover:bg-slate-600 text-white text-xs uppercase font-semibold rounded-xl px-6 py-2">close</button>
        <button wire:click="save" class="bg-indigo-600 dark:bg-blue-500 hover:opacity-90 text-gray-50 text-xs uppercase font-semibold rounded-xl  px-6 py-2">save</button>
    </div>
</div>
