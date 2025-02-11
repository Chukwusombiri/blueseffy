<div class="bg-white dark:bg-gray-900">
  <div class="max-w-md mx-auto p-4">
      <div class="flex justify-start">
          <label for="receipt"
              class="bg-gray-700 dark:bg-slate-500 hover:opacity-80 text-gray-100 font-semibold text-sm mb-2 rounded px-4 py-2 cursor-pointer">Select an image</label>
          <input type="file" wire:model="receipt" id="receipt" class="hidden">
      </div>
      <x-jet-input-error for="receipt" class="mt-1 block" />
      @if ($receipt)
          <p class="text-sm font-semibold text-gray-800 dark:text-gray-200 mt-2">File: {{ $receipt->getClientOriginalName() }}</p>
      @endif
      <div class="mt-4 mb-4">
          <p class="text-sm text-yellow-600 dark:text-yellow-500"><strong>Warning:</strong> This action cannot be reversed.</p>
      </div>
  </div>
  <div class="bg-gray-50 dark:bg-slate-900 px-4 py-4">
      <div wire:loading.delay.long wire:target="save" class="font-semibold text-center text-gray-600 dark:text-gray-400 mb-2">
          Uploading image...
      </div>
      <div class="flex justify-end">
          <button class="mr-2 bg-red-500 text-white hover:bg-red-700 px-6 py-2 rounded-xl text-xs font-semibold uppercase"
              wire:click="$emit('closeModal')">Close</button>
          <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-semibold py-2 px-6 rounded-xl text-xs uppercase"
              wire:click="save">
              Upload
          </button>
      </div>
  </div>
</div>

