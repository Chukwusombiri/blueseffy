<div class="max-w-6xl mx-auto">
    <div class="mb-10">
        <h2 class="text-center text-gray-700 dark:text-gray-200 text-2xl font-semibold mb-4 text-center">Fill out the form</h2>
        <p class="text-center mx-auto text-gray-600 dark:text-gray-400 md:w-1/2">
            {{ config('app.name') }} accepts only cryptocurrency as a source of funding for investment. Investment can
            also be funded using available funds in your portfolio
        </p>
    </div>

    <div class="max-w-2xl mx-auto">
        <div class="relative">
            @include('inc.messages')
            <div class="fixed top-0 right-0 left-0 bottom-0 z-50 bg-gray-800 bg-opacity-30" wire:loading.delay.long
                wire:target="save">
                <div class="w-full h-full flex justify-center items-center">
                    <svg class="animate-spin w-10 h-10 text-white" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                        width="24" height="24" stroke-width="2">
                        <path d="M3 12a9 9 0 0 0 9 9a9 9 0 0 0 9 -9a9 9 0 0 0 -9 -9"></path>
                        <path d="M17 12a5 5 0 1 0 -5 5"></path>
                    </svg>
                    <span class="ml-2 text-md text-white">
                        creating order
                    </span>
                </div>
            </div>
            <div class="w-full px-4 py-5 bg-white dark:bg-gray-900 sm:p-6 shadow sm:rounded-t-md">
                <div class="flex flex-nowrap items-center gap-3 mb-2">
                    <input type="radio" id="crypto" wire:model="source" value="crypto" class="bg-white border-gray-300 dark:bg-gray-700 dark:border-gray-600"/>
                    <label for="crypto" class="text-gray-700 dark:text-gray-300 text-sm">CRYPTOCURRENCY</label>
                </div>
                <div class="flex flex-nowrap items-center gap-3">
                    <input id="funds" type="radio" wire:model="source" value="funds" class="bg-white border-gray-300 dark:bg-gray-700 dark:border-gray-600"/>
                    <label for="funds" class="text-gray-700 dark:text-gray-300 text-sm">ACCOUNT FUNDS</label>
                </div>
                @if ($source === 'funds')
                    <p class="text-lg archivo-700 text-gray-600 dark:text-gray-400 py-4 text-sm">Available Funds: ${{ number_format($user->doBal) }}</p>
                @endif
                <div class="grid grid-cols-6 gap-6 mt-4">
                    <div class="col-span-6 md:col-span-5">
                        <x-jet-label for="amount"
                            value="{{ 'Amount: Range($' . $plan->min . ' - $' . $plan->max . ')' }}" />
                        <x-jet-input id="amount" type="number" class="mt-1 block w-full" wire:model.defer="amount"
                            autocomplete="amount" />
                        <x-jet-input-error for="amount" class="mt-2" />
                    </div>

                    @if ($source == 'crypto')
                        <div class="col-span-6 sm:col-span-5">
                            <x-jet-label for="wallet_id" value="{{ __('Select Payment') }}" />
                            <select name="wallet_id" id="wallet_id"
                                class="text-gray-800 dark:text-gray-100 bg-inherit mt-1 block w-full border-gray-300 dark:border-gray-700 focus:border-indigo-300 dark:focus:border-blue-300 rounded-md shadow-sm"
                                wire:model.defer="wallet_id">
                                <option class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300" value="" @if (old('wallet_id') == '') {{ 'selected' }} @endif>
                                    select cryptocurrency</option>
                                @foreach ($wallets as $wallet)
                                    <option class="bg-white dark:bg-gray-900 text-gray-800 dark:text-gray-300" value="{{ $wallet->id }}"
                                        @if (old('wallet_id') == $wallet->id) {{ 'selected' }} @endif>
                                        {{ $wallet->name }}</option>
                                @endforeach
                            </select>
                            <x-jet-input-error for="wallet_id" class="mt-2" />
                        </div>
                    @endif
                </div>
            </div>
            <div
                class="flex items-center justify-end px-4 py-3 bg-gray-50 dark:bg-gray-700 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <x-jet-confirms-password wire:then="save">
                    <x-jet-button wire:loading.attr="disabled">
                        {{ __('Complete Investment') }}
                    </x-jet-button>
                </x-jet-confirms-password>
            </div>
        </div>
        <div class="mt-14 md:mt-24">
            <h2
                class="text-center text-gray-700 dark:text-gray-200 text-3xl capitalize mx-auto mt-20 mb-4 font-semibold">Use
                Real-Time Converter</h2>
            <div class="flex justify-center">
                <!-- Crypto Converter ⚡ Widget -->
                <crypto-converter-widget shadow symbol live background-color="#383a59" border-radius="0.60rem"
                    fiat="united-states-dollar" crypto="bitcoin" amount="1"
                    decimal-places="2"></crypto-converter-widget>

                <!-- /Crypto Converter ⚡ Widget -->
            </div>
        </div>
    </div>
</div>
