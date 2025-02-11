<div class="max-w-6xl mx-auto px-6 bg-white dark:bg-gray-800">        
    <div class="mb-10 lg:mb-16 bg-indigo-100 dark:bg-blue-100 rounded-xl p-6 lg:p-10">
        <h3 class="text-gray-800 text-xl font-bold mb-2 sora">Portfolio summary</h3>
        <p class="text-gray-600 text-sm mb-6">Asset withdrawals are not permitted during an active trading session.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div class="flex flex-col items-center border-0 border-b border-gray-400 md:border-b-0 md:border-r pb-3 lg:pb-0">
                <h2 class="sora text-3xl font-bold tracking_wide">@if(auth()->user()->is_paused)
                    {{ 'ACCOUNT SUSPENDED' }}
                 @else
                    @switch(auth()->user()->status)
                         @case('earning')
                             {{'ACTIVE TRADING'}}
                             @break
                         @case('not_earning')
                            {{'TRADING SESSION COMPLETED'}}
                            @break
                        @case('dormant')
                            {{'DORMANT'}}
                            @break
                        @case('active')
                            {{'YET TO TRADE'}}
                            @break                    
                     @endswitch
                 @endif</h2>
                <h5 class="font-semibold text-lg">Trading Session</h5>
            </div>
            <div class="flex flex-col items-center border-0 border-b border-gray-400 md:border-b-0 lg:border-r pb-3 lg:pb-0">
                <h2 class="sora text-3xl font-bold tracking_wide">${{ number_format(auth()->user()->acROI)}}</h2>
                <h5 class="font-semibold text-lg">R.O.I</h5>
            </div>
            <div class="flex flex-col items-center">
                <h2 class="sora text-3xl font-bold tracking_wide">${{auth()->user()->acBal > 0 ? number_format(auth()->user()->acBal) : "0.00"}}</h2>
                <h5 class="font-semibold text-lg">Active Capital</h5>
            </div>
        </div>                                                         
    </div>   
    {{-- withdrawal form --}} 
    <div class="max-w-2xl mx-auto pb-20">
        <div class="relative">
            @include('inc.messages')
            <div class="fixed top-0 right-0 left-0 bottom-0 z-50 bg-gray-800 bg-opacity-30" wire:loading.delay.long
                wire:target="save">
                <div class="w-full h-full flex justify-center items-center">
                    <svg class="animate-spin w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg"
                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                        stroke-linejoin="round" width="24" height="24" stroke-width="2">
                        <path d="M3 12a9 9 0 0 0 9 9a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9"></path>
                        <path d="M17 12a5 5 0 1 0 -5 5"></path>
                    </svg>
                    <span class="ml-2 text-md text-white">
                        initiating withdrawal
                    </span>
                </div>
            </div>
            <div class="w-full px-4 py-5 bg-white dark:bg-gray-900 sm:p-6 shadow sm:rounded-t-md">
                <div class="grid grid-cols-6 gap-6 mt-4">
                    <div class="col-span-6 md:col-span-5">
                        <x-jet-label for="amount" value="Amount to withdraw" />
                        <x-jet-input id="amount" type="number" class="mt-1 block w-full" wire:model.defer="amount"
                            autocomplete="amount" />
                        <x-jet-input-error for="amount" class="mt-2" />
                    </div>

                    <div class="col-span-6 sm:col-span-5">
                        <x-jet-label for="user_wallet_id" value="{{ __('Destination wallet') }}" />
                        <select name="user_wallet_id" id="user_wallet_id"
                            class="text-gray-800 dark:text-gray-100 bg-inherit mt-1 block w-full border-gray-300 dark:border-gray-700 focus:border-indigo-300 dark:focus:border-blue-300 rounded-md shadow-sm"
                            wire:model.defer="user_wallet_id">
                            <option class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300" value=""
                                @if ($user_wallet_id === '') {{ 'selected' }} @endif>
                                select wallet</option>
                            @foreach ($userWallets as $userWallet)
                                <option class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300"
                                    value="{{ $userWallet->id }}"
                                    @if ($user_wallet_id === $userWallet->id) {{ 'selected' }} @endif>
                                    {{ $userWallet->name }}</option>
                            @endforeach
                        </select>
                        <x-jet-input-error for="user_wallet_id" class="mt-2" />
                    </div>
                </div>
            </div>
            <div
                class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-900 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <button class="mr-2 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" 
                wire:click="$emit('openModal','admin.add-user-wallet',{{ json_encode(['id'=>auth()->user()->id])}} )">
                    {{ __('Add wallet') }}
                </button>
                <x-jet-confirms-password wire:then="save">
                    <x-jet-button wire:loading.attr="disabled">
                        {{ __('Complete Withdrawal') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            </div>
        </div>        
    </div>
</div>
