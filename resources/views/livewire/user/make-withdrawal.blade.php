<div class="mycontainer">    
    <div class="mb-20">
        <p class="flex flex-nowrap justify-center item-center text-base text-indigo-600 uppercase font-bold mb-7">Make crytocrrency Withdrawal</p>
        <h2 class="text-center text-dark text-2xl capitalize mx-auto mb-4 md:w-1/2">Fill out your crytocrrency withdrawal form below.</h2>
        <p class="text-center mx-auto text-slate-600 md:w-1/2">In order to make funds withdrawal through cryptocurrency, you will need to add your cryptocurrency
        wallets to accounts. Navigate to 'Wallets' and add your wallets.</p>
    </div>  
    <div class="mb-20 bg-white px-4 py-2 rounded-sm shadow-md">
        <h3 class="text-slate-900 text-xl font-bold mb-7">Portfolio Value</h3>
        <h4 class="text-slate-700 text-lg font-bold">Return On INVESTMENTS: ${{(!empty($acROI))?$acROI:"0.00"}}</h4>
        <h4 class="text-slate-700 text-lg font-bold">Active Capital: ${{(!empty($acbal))?$acbal:"0.00"}}</h4>       
        <h4 class="text-slate-700 text-lg font-bold">Trading Session: @if(auth()->user()->is_paused)
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
         @endif</h4>        
        <p class="text-slate-500 text-base font-bold">NB: You cannot initiate funds withdrawal during an active trading session.</p>                                              
    </div>   
    {{-- withdrawal form --}}   
    <div class="md:grid md:grid-cols-2 gap-6 pb-20">       
        <div class="col-span-2 md:col-span-1">                 
            @include('inc.messages')           
            <div wire:loading.delay.long wire:target="save" class="w-50 justify-center">
                <span>Processing...</span>
            </div>  
            <div class="px-4 py-5 bg-white sm:p-6 shadow sm:rounded-tl-md sm:rounded-tr-md">
                <div class="grid grid-cols-6 gap-6">
                    <div class="col-span-6 md:col-span-5">                    
                        <x-jet-label for="amount" value="{{ 'Amount to withdraw' }}" />
                        <x-jet-input id="amount" type="number" class="mt-1 block w-full" wire:model.defer="amount" autocomplete="amount" />
                        <x-jet-input-error for="occupation" class="mt-2" />
                    </div>            
                      
                    <div class="col-span-6 sm:col-span-5">
                        <x-jet-label for="user_user_wallet_id" value="{{ __('Enter Destination Wallet') }}" />
                        <select name="user_wallet_id" id="user_wallet_id" class="mt-1 block w-full 
                        border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 
                        focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="user_wallet_id">
                        <option value="" @if(old('user_wallet_id')==''){{'selected'}}@endif>select cryptocurrency</option>                    
                        @if (!empty($userwallets) && count($userwallets)>0)
                            @foreach ($userwallets as $userwallet)
                                <option value="{{$userwallet->id}}"  @if(old('user_user_wallet_id')==$userwallet->id){{'selected'}}@endif>{{$userwallet->name}} {{"(".$userwallet->address.")"}}</option>
                            @endforeach
                        @else
                            <option class="w-5/6"><a href="{{route('user.wallets')}}">Add new wallet</a></option>
                        @endif
                        </select>            
                        <x-jet-input-error for="user_wallet_id" class="mt-2" />           
                    </div>     
                </div>
            </div>      
            <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">
                <button class="mr-2 inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:ring focus:ring-blue-200 active:text-gray-800 active:bg-gray-50 disabled:opacity-25 transition" 
                wire:click="$emit('openModal','admin.add-user-wallet',{{ json_encode(['id'=>$user->id])}} )">
                    {{ __('Add wallet') }}
                </button>

                <x-jet-confirms-password wire:then="save">                    
                    <x-jet-button wire:loading.attr="disabled">
                        {{ __('Complete Withdrawal') }}
                    </x-jet-button>
                </x-jet-confirms-password> 
            </div>                                                                       
        </div>
        <div class="col-span-2 md:col-span-1">
            <span class="flex flex-nowrap justify-center item-center text-dark text-2xl capitalize mx-auto mt-20 mb-4 md:mt-[-14px] md:w-1/2 ">Use Real-Time Converter</span>
            <div class="flex flex-nowrap justify-center item-center">               
                 <!-- Crypto Converter ⚡ Widget -->
                <crypto-converter-widget 
                shadow 
                symbol 
                live 
                background-color="#383a59" 
                border-radius="0.60rem" 
                fiat="united-states-dollar"
                crypto="bitcoin"
                amount="1" 
                decimal-places="2"
                ></crypto-converter-widget>                
                
                <!-- /Crypto Converter ⚡ Widget -->
            </div>
        </div>
    </div>
    {{-- withdrawal form ends --}}    
</div>
