<div>
    <div class="container py-4">
        <div>
            <h2 class="md:text-lg ml-4 text-dark-700 text-center">Promo for members</h2>
        </div>
        <div class="w-3/4 mx-auto mb-2">
            @if (session()->has('result'))
                <div class="inline-block bg-red-100 mt-2 p-2 rounded-md">
                    {{ session('result') }}
                </div>
            @endif
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">promo name</label>
            <input type="text" class="form-control px-2 py-2 rounded-lg" wire:model="name" name="name">
            @error('name')
                <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>               
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Amount to fund</label>
            <input type="number" wire:model="amount" class="form-control px-2 py-2 rounded-lg">
            @error('amount')
                <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="promo_message" class="form-label">Description (this is promo email content)</label>
           <textarea name="promo_message" wire:model="promo_message" id="promo_message" cols="30" rows="5"
            class="form-control px-2 py-2 rounded-lg"></textarea>
            @error('promo_message')
                <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>
        <div class="divider-sm-y"></div>
        <div class="flex flex-row justify-end w-3/4 mx-auto p-2">
            <button onclick="Livewire.emit('closeModal')" class="btn rounded-full bg-secondary px-3 mr-2 hover:bg-transfer hover:text-dark">close</button>
            <button wire:click="submit" class="btn rounded-full bg-info px-3 hover:bg-transfer hover:text-dark">fund</button>
        </div>
    </div>
</div>
