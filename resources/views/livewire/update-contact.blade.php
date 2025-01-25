<x-jet-form-section submit="save">
    <x-slot name="title">
        {{ __('Bio Informations') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s Bio.') }}
    </x-slot>

    <x-slot name="form">
        <!-- occupation -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="occupation" value="{{ __('Occupation') }}" />
            <x-jet-input id="occupation" type="text" class="mt-1 block w-full" wire:model.defer="occupation" autocomplete="name" />
            <x-jet-input-error for="occupation" class="mt-2" />
        </div>

        <!-- marital status -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="marital_status" value="{{ __('Marital Status') }}" />
            <select name="marital_status" id="marital_status" class="mt-1 block w-full 
            border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 
            focus:ring-opacity-50 rounded-md shadow-sm" wire:model.defer="marital_status">
                <option value="single">Single</option>
                <option value="married">Married</option>
                <option value="divorced">Divorced</option>
            </select>            
            <x-jet-input-error for="marital_status" class="mt-2" />           
        </div>

        {{-- address --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="address" value="{{ __('Address') }}" />
            <x-jet-input id="address" type="text" wire:model.defer="address" class="mt-1 block w-full"/>   
            <x-jet-input-error for="address" class="mt-2" />         
        </div>

        {{-- country --}}
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="country" value="{{ __('Country') }}" />
            <x-jet-input id="country" wire:model.defer="country"  type="text" class="mt-1 block w-full"/>            
        </div>
    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-jet-button wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-jet-button>
    </x-slot>
</x-jet-form-section>
