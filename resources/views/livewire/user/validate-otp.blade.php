<div class="bg-white dark:bg-gray-900 p-4">
    <h2 class="text-lg text-gray-800 dark:text-gray-200 font-semibold text-center">Validate Withdrawal</h2>
    @if (session()->has('result'))
        <div class="my-1.5 text-rose-600 text-sm tracking-wide">
            {{ session('result') }}
        </div>
    @endif
    @if ($isSent)
        <p class="text-green-500 my-1.5 text-sm tracking-wide">One Time password was sent to your email address</p>
    @endif
    <div class="flex flex-col gap-2 mb-3">
        <x-jet-label for="otp" value="Enter your OTP" />
        <x-jet-input type="number" wire:model="otp" class="w-full" />           
        @error('otp')
            <span class="text-rose-600 text-sm tracking-wide">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex justify-center">
        <button wire:click="send" wire:loading.attr="disabled"
        class="mr-2 inline-flex items-center px-6 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition">
        {{ $isSent ? 'REQUEST NEW OTP' : 'REQUEST OTP' }}
    </button>
    </div>


    <div class="flex justify-end items-center pb-2 mt-4">
        <button wire:click="$emit('closeModal')"
            class="bg-gray-500 text-white font-semibold rounded-xl px-6 py-2 mr-2 text-xs uppercase hover:bg-gray-600">close</button>
        <button wire:click="save"
            class="bg-indigo-600 font-semibold text-white dark:bg-blue-500 rounded-xl px-6 py-2 mr-2 text-xs uppercase hover:bg-indigo-700 dark:hover:bg-blue-700">submit</button>
    </div>
</div>