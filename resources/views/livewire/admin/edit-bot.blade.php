<div>
    <div class="container py-4">
        <div>
            <h2 class="md:text-lg ml-4 text-dark-700 text-center">Edit Bot</h2>
        </div>
        <div class="w-3/4 mx-auto mb-2">
            @if (session()->has('error'))
                <div class="bg-rose-100 mt-2 p-2 text-rose-900">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Name</label>
            <input type="text" wire:model.lazy="name" class="form-control px-2 py-2 rounded-lg">
            @error('name')
                <span class="inline-block text-rose-600 m-2 text-sm font-semibold">{{$message}}</span> 
            @enderror
        </div>                        
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Price</label>
            <input type="number" wire:model.lazy="price" class="form-control px-2 py-2 rounded-lg">
            @error('price')
                <span class="inline-block text-rose-600 m-2 text-sm font-semibold">{{$message}}</span> 
            @enderror
        </div> 
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Multiplier</label>
            <input type="number" wire:model.lazy="multiplier" class="form-control px-2 py-2 rounded-lg">
            @error('multiplier')
                <span class="inline-block text-rose-600 m-2 text-sm font-semibold">{{$message}}</span> 
            @enderror
        </div>           
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Duration</label>
            <input type="number" wire:model.lazy="duration" class="form-control px-2 py-2 rounded-lg">
            @error('duration')
                <span class="inline-block text-rose-600 m-2 text-sm font-semibold">{{$message}}</span> 
            @enderror
        </div>             
        <div class="flex justify-end items-center w-full p-4">
            <button onclick='Livewire.emit("closeModal")'
             class="rounded-full bg-gray-300 text-gray-900 hover:bg-rose-500 px-4 py-2 mr-2">close</button>
            <button wire:click="save" class="rounded-full bg-gray-900 text-white px-4 py-2">complete</button>
        </div>
    </div>
</div>