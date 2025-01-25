<div>
    <div class="container py-4">
        <div>
            <h2 class="md:text-lg ml-4 text-dark-700 text-center">Add new wallet</h2>
        </div>
        <div class="w-3/4 mx-auto mb-2">
            @if (session()->has('result'))
                <div class="bg-red-100 mt-2 p-2">
                    {{ session('result') }}
                </div>
            @endif
        </div>
        <div class="w-10/12 mx-auto mb-2">
            <label for="" class="block form-label">wallet name</label>
            <input type="text" wire:model="name" class="w-full form-control px-2 py-2 rounded-md">
            @error('name')
               <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div> 
              
        <div class="w-10/12 mx-auto mb-2">
            <label for="" class="block form-label">wallet address</label>
            <input type="text" wire:model="address" class="w-full form-control px-2 py-2 rounded-md">
            @error('address')
                <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>               
        <div class="flex flex-row justify-end w-3/4 mx-auto p-2">
            <button onclick="Livewire.emit('closeModal')"
             class="bg-slate-200 rounded-full px-3 mr-2">close</button>
            <button wire:click="save" class="bg-blue-300 rounded-full bg-info px-3">save</button>
        </div>
    </div>
</div>
