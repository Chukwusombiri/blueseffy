<div>
    <div class="container py-4">
        <div>
            <h2 class="md:text-lg ml-4 text-dark-700 text-center">Edit Bot subscription</h2>
        </div>
        <div class="w-3/4 mx-auto mb-2">
            @if (session()->has('error'))
                <div class="bg-rose-100 mt-2 p-2 text-rose-900">
                    {{ session('error') }}
                </div>
            @endif
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Bots</label>
            <select wire:model.lazy="bot" class="form-control px-2 py-2 rounded-lg">
                <option value="">select bot</option>
               @foreach ($allBots as $b)
                    <option value="{{$b->name}}" @if($subscription->bot==$b->name) {{'selected'}} @endif>
                        {{$b->name}}</option>                   
               @endforeach
            </select>
            @error('bot')
               <span class="inline-block text-rose-600 m-2 text-sm font-semibold">{{$message}}</span> 
            @enderror
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Payment Wallet</label>
            <select wire:model.lazy="wallet" class="form-control px-2 py-2 rounded-lg">
                <option value="">select wallet</option>                
               @foreach ($allWallets as $w)
                    <option value="{{$w->name}}" @if($subscription->wallet==$w->name) {{'selected'}} @endif>{{$w->name}}</option>                   
               @endforeach
            </select>
            @error('wallet')
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
            <label for="" class="form-label">Subscription status</label>
            <select wire:model.lazy="status" class="form-control px-2 py-2 rounded-lg">
                <option value="">select status</option>                
                <option value="pending">Pending</option>
                <option value="active">Active</option>
                <option value="suspended">Suspended</option>
                <option value="expired">Expired</option>
            </select>
            @error('status')
               <span class="inline-block text-rose-600 m-2 text-sm font-semibold">{{$message}}</span> 
            @enderror
        </div>  
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Days Left</label>
            <input type="number" wire:model.lazy="days_left" class="form-control px-2 py-2 rounded-lg">
            @error('days_left')
                <span class="inline-block text-rose-600 m-2 text-sm font-semibold">{{$message}}</span> 
            @enderror
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Date of subscription</label>
            <input type="datetime-local" wire:model.lazy="date" class="form-control px-2 py-2 rounded-lg">
            @error('date')
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