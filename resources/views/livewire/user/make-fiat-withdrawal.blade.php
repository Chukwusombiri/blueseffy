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
                <x-jet-input-error for="amount" class="mt-2" />
            </div>
            
            <div class="col-span-6 md:col-span-5">                    
                <x-jet-label for="account_no" value="{{ 'Account Number' }}" />
                <x-jet-input id="account_no" type="number" minimum="8" class="mt-1 block w-full" wire:model.defer="account_no" autocomplete="account_no" />
                <x-jet-input-error for="account_no" class="mt-2" />
            </div>

            <div class="col-span-6 md:col-span-5">                    
                <x-jet-label for="account_name" value="{{ 'Account Name' }}" />
                <x-jet-input id="account_name" type="text" class="mt-1 block w-full" wire:model.defer="account_name" autocomplete="account_name" />
                <x-jet-input-error for="account_name" class="mt-2" />
            </div>
            <div class="col-span-6 md:col-span-5">                    
                <x-jet-label for="bank_name" value="{{ 'Bank Name' }}" />
                <x-jet-input id="bank_name" type="text" class="mt-1 block w-full" wire:model.defer="bank_name" autocomplete="bank_name" />
                <x-jet-input-error for="bank_name" class="mt-2" />
            </div>
            <div class="col-span-6 md:col-span-5">                    
                <x-jet-label for="routing_no" value="{{ 'Routing Number' }}" />
                <x-jet-input id="routing_no" type="number" class="mt-1 block w-full" wire:model.defer="routing_no" autocomplete="routing_no" />
                <x-jet-input-error for="routing_no" class="mt-2" />
            </div>                  
            <div class="col-span-6 md:col-span-5">                    
                <x-jet-label for="description" value="{{ 'Description' }}" />
                <x-jet-input id="description" type="text" class="mt-1 block w-full" wire:model.defer="description"/>                        
                <x-jet-input-error for="description" class="mt-2" />
            </div>                      
        </div>
    </div>      
    <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6 shadow sm:rounded-bl-md sm:rounded-br-md">                                                  
        <x-jet-button wire:click="save">
            {{ __('Complete Withdrawal') }}
        </x-jet-button>                 
    </div>                                                                       
</div>
       
