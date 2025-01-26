<div class="w-full bg-transparent">
    <div class="py-10 w-full max-w-sm mx-auto">
        <p class="text-md font-semibold text-gray-600">Are you sure you want to remove member's profile image?</p>
        <div class="flex justify-end gap-3 items-center px-4 mt-4">
            <button wire:click="$emit('closeModal')"
                class="border-2 border-red-500 text-red-500 rounded-full px-6 py-2 uppercase text-sm hover:bg-gray-200">cancel</button>
            <button wire:click="remove"
                class="border-2 border-gray-600 bg-gray-600 text-white rounded-full px-6 py-2 uppercase text-sm hover:bg-gray-700">proceed</button>
        </div>
    </div>
</div>
