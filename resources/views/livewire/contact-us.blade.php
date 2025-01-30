<div class="relative rounded-lg p-6 border border-indigo-600 dark:border-gray-600">
    <div wire:loading.delay.long  wire:target="submit" class="fixed top-0 right-0 left-0 bottom-0 z-50 bg-gray-800/60">
      <div class="w-full h-full flex items-center justify-center gap-2">
        <svg class="w-6 h-6 animate-spin text-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2">
          <path d="M12 6l0 -3"></path>
          <path d="M6 12l-3 0"></path>
          <path d="M7.75 7.75l-2.15 -2.15"></path>
        </svg>
          <p class="text-sm text-gray-100 font-semibold tracking-wide">
            sending inquriy
          </p>
      </div>
    </div>
    <div class="mb-4 flex flex-col gap-2">
      <input wire:model="subject" type="text" placeholder="Your Name"
      class="appearance-none bg-transparent text-gray-700 dark:text-gray-200 border-0 border-b border-gray-400 dark:border-gray-700 ring-0 focus:ring-0 focus:border-b focus:border-gray-300 dark:focus:border-gray-500 w-full p-2 text-sm outline-none focus:outline-none placeholder:text-gray-500 dark:placeholder:text-gray-400" />  
        @error('subject')
            <span class="text-rose-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4 flex flex-col gap-2">
        <input wire:model="email" type="email" placeholder="Your Email"
            class="appearance-none bg-transparent text-gray-700 dark:text-gray-200 border-0 border-b border-gray-400 dark:border-gray-700 ring-0 focus:ring-0 focus:border-b focus:border-gray-300 dark:focus:border-gray-500 w-full p-2 text-sm outline-none focus:outline-none placeholder:text-gray-500 dark:placeholder:text-gray-400" />
        @error('email')
            <span class="text-rose-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    <div class="mb-4 flex flex-col gap-2">
        <input type="text" placeholder="Your Phone" wire:model="phone"
            class="appearance-none bg-transparent text-gray-700 dark:text-gray-200 border-0 border-b border-gray-400 dark:border-gray-700 ring-0 focus:ring-0 focus:border-b focus:border-gray-300 dark:focus:border-gray-500 w-full p-2 text-sm outline-none focus:outline-none placeholder:text-gray-500 dark:placeholder:text-gray-400" />
    </div>
    <div class="mb-4 flex flex-col gap-2">
        <textarea wire:model="msg" rows="6" placeholder="Your Message"
            class="appearance-none bg-transparent text-gray-700 dark:text-gray-200 border-0 border-b border-gray-400 dark:border-gray-700 ring-0 focus:ring-0 focus:border-b focus:border-gray-300 dark:focus:border-gray-500 w-full p-2 text-sm outline-none focus:outline-none placeholder:text-gray-500 dark:placeholder:text-gray-400"></textarea>
        @error('msg')
            <span class="text-rose-500 text-sm">{{ $message }}</span>
        @enderror
    </div>
    @if ($response)
        <p class="text-green-600 dark:text-green-500">{{ 'We\'ll get back to you shortly.' }}</p>
    @endif

    <div class="flex justify-center mt-6">
        <button wire:click="submit"
            class="bg-indigo-600 dark:bg-blue-500 px-6 py-3 rounded-xl text-gray-50 transition hover:bg-opacity-90 text-xs uppercase tracking-wide font-semibold">
            Send inquiry
        </button>
    </div>

</div>
