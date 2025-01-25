<div>   
    <div class="bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">       
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Create Promo for User
        </h3>      
    </div>
    <div class="bg-white px-4 sm:p-6">
        <div class="py-4">            
            <div class="form-group">
                    <label for="name">{{__('Name')}}</label>
                    <input type="text" name="name" wire:model="name" class="form-control">
                    @error('name') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="amount">{{__('amount')}}</label>
                <input type="number" name="amount" wire:model="amount" class="form-control">
                @error('amount') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="message">{{__('message to member')}}</label>
                <textarea type="text" name="message" wire:model="message" class="form-control"></textarea>
                @error('message') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
            </div>            
        </div>
    </div>
   
    <div class="bg-white px-4 pb-5 sm:px-4 sm:flex">
        <button class="btn btn-secondary" wire:click="$emit('closeModal')">Close</button>
        <button class="btn btn-info ml-3" type="button" wire:click="submit">Save</button>
    </div>
</div>
