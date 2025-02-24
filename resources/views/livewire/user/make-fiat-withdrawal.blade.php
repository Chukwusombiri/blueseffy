<div class="max-w-6xl mx-auto px-6 bg-white dark:bg-gray-800">
    <div class="mb-10 lg:mb-16 bg-indigo-100 dark:bg-blue-100 rounded-xl p-6 lg:p-10">
        <h3 class="text-gray-800 text-xl font-bold mb-2 sora">Portfolio summary</h3>
        <p class="text-gray-600 text-sm mb-1">
            This feature is only supported for USD withdrawal. May include support for other fiat currencies in future.
        </p>
        <p class="text-gray-600 text-sm mb-6">Asset withdrawals are not permitted during an active trading session.</p>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            <div
                class="flex flex-col items-center border-0 border-b border-gray-400 md:border-b-0 md:border-r pb-3 lg:pb-0">
                <h2 class="sora text-3xl font-bold tracking_wide">
                    @if (auth()->user()->is_paused)
                        {{ 'ACCOUNT SUSPENDED' }}
                    @else
                        @switch(auth()->user()->status)
                            @case('earning')
                                {{ 'ACTIVE TRADING' }}
                            @break

                            @case('not_earning')
                                {{ 'TRADING SESSION COMPLETED' }}
                            @break

                            @case('dormant')
                                {{ 'DORMANT' }}
                            @break

                            @case('active')
                                {{ 'YET TO TRADE' }}
                            @break
                        @endswitch
                    @endif
                </h2>
                <h5 class="font-semibold text-lg">Trading Session</h5>
            </div>
            <div
                class="flex flex-col items-center border-0 border-b border-gray-400 md:border-b-0 lg:border-r pb-3 lg:pb-0">
                <h2 class="sora text-3xl font-bold tracking_wide">${{ number_format(auth()->user()->acROI) }}</h2>
                <h5 class="font-semibold text-lg">R.O.I</h5>
            </div>
            <div class="flex flex-col items-center">
                <h2 class="sora text-3xl font-bold tracking_wide">
                    ${{ auth()->user()->acBal > 0 ? number_format(auth()->user()->acBal) : '0.00' }}</h2>
                <h5 class="font-semibold text-lg">Active Capital</h5>
            </div>
        </div>
    </div>
    {{-- withdrawal form --}}
    <div class="max-w-6xl mx-auto pb-20">
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
            <div
                class="w-full px-4 py-5 bg-white dark:bg-gray-900 sm:p-6 border dark:border-0 border-gray-200 rounded-md">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 md:col-span-3">
                        <x-jet-label for="amount" value="{{ 'Amount to withdraw' }}" />
                        <x-jet-input id="amount" type="number" class="mt-1 block w-full" wire:model.defer="amount"
                            autocomplete="amount" />
                        <x-jet-input-error for="amount" class="mt-2" />
                    </div>

                    <div class="col-span-6 md:col-span-3">
                        <x-jet-label for="account_no" value="{{ 'Account Number' }}" />
                        <x-jet-input id="account_no" type="number" minimum="8" class="mt-1 block w-full"
                            wire:model.defer="account_no" autocomplete="account_no" />
                        <x-jet-input-error for="account_no" class="mt-2" />
                    </div>

                    <div class="col-span-6 md:col-span-3">
                        <x-jet-label for="account_name" value="{{ 'Account Name' }}" />
                        <x-jet-input id="account_name" type="text" class="mt-1 block w-full"
                            wire:model.defer="account_name" autocomplete="account_name" />
                        <x-jet-input-error for="account_name" class="mt-2" />
                    </div>
                    <div class="col-span-6 md:col-span-3">
                        <x-jet-label for="bank_name" value="{{ 'Bank Name' }}" />
                        <x-jet-input id="bank_name" type="text" class="mt-1 block w-full"
                            wire:model.defer="bank_name" autocomplete="bank_name" />
                        <x-jet-input-error for="bank_name" class="mt-2" />
                    </div>
                    <div class="col-span-6 md:col-span-3">
                        <x-jet-label for="routing_no" value="{{ 'Routing Number' }}" />
                        <x-jet-input id="routing_no" type="number" class="mt-1 block w-full"
                            wire:model.defer="routing_no" autocomplete="routing_no" />
                        <x-jet-input-error for="routing_no" class="mt-2" />
                    </div>
                    <div class="col-span-6 md:col-span-3">
                        <x-jet-label for="description" value="{{ 'Description' }}" />
                        <x-jet-input id="description" type="text" class="mt-1 block w-full"
                            wire:model.defer="description" />
                        <x-jet-input-error for="description" class="mt-2" />
                    </div>
                </div>
                <div class="mt-6 flex items-center justify-end">
                    <x-jet-button wire:loading.attr="disabled" wire:click="save">
                        {{ __('Complete Withdrawal') }}
                    </x-jet-button>
                </div>
            </div>
        </div>
    </div>
</div>
