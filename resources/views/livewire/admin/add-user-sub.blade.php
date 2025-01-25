<div>
    <div class="w-full px-6 py-4">  
        <h2 class="font-semibold text-xl text-center mb-8">Create Bot subscription for investor</h2> 
        @if (session('error'))
            <div class="bg-rose-100 rounded text-rose-900 font-semibold text-sm p-2">{{session('error')}}</div>
        @endif     
        <div class="w-3/4 mx-auto mb-6">
            <label for="bot">Select bot</label>
            <select id="bot" wire:model="bot"
                class="form-control @error('bot') is-invalid @enderror" required>
                <option @if (old('user_id') === '') {{ 'selected' }} @endif>Choose bot</option>
                @if (count($allBots) > 0)
                    @foreach ($allBots as $b)
                        <option value="{{ $b->name }}">{{ $b->name }}</option>
                    @endforeach               
                @endif
            </select>
            @error('bot')
                <div class="bg-red-100 mt-2 p-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="w-3/4 mx-auto mb-6">
            <label for="price">Price</label>
            <input type="number"
                class="form-control @error('price') is-invalid @enderror"
                id="price" wire:model="price" required>

            @error('price')
                <div class="bg-red-100 mt-2 p-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="w-3/4 mx-auto mb-6">
            <label for="multiplier">Multiplier</label>
            <input type="number"
                class="form-control @error('multiplier') is-invalid @enderror"
                id="multiplier" wire:model="multiplier" required>

            @error('multiplier')
                <div class="bg-red-100 mt-2 p-2">{{ $message }}</div>
            @enderror
        </div>        
        <div class="w-3/4 mx-auto mb-6">
            <label for="wallet">Payment Wallet</label>
            <select id="wallet" wire:model="wallet"
                class="form-control @error('wallet') is-invalid @enderror" required>
                <option value="">Choose wallet</option>
                @if (count($allWallets) > 0)
                    @foreach ($allWallets as $w)
                        <option value="{{ $w->name }}">{{ $w->name }}</option>
                    @endforeach
                @endif
            </select>
            @error('wallet')
                <div class="bg-red-100 mt-2 p-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="w-3/4 mx-auto mb-6">
            <label for="" class="form-label">Subscription status</label>
            <select wire:model="status" class="form-control px-2 py-2 rounded-lg">
                <option value="">select status</option>                
                <option value="pending">Pending</option>
                <option value="active">Active</option>
                <option value="suspended">Suspended</option>
                <option value="expired">Expired</option>
            </select>
            @error('status')
               <span class="bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>  
        <div class="w-3/4 mx-auto mb-6">
            <label for="" class="form-label">Days Left</label>
            <input type="number" wire:model="days_left" class="form-control px-2 py-2 rounded-lg">
            @error('days_left')
                <span class="bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>        
        <div class="flex justify-end items-center w-full p-4">
            <button onclick='Livewire.emit("closeModal")'
             class="rounded-full bg-gray-300 text-gray-900 hover:bg-rose-500 px-4 py-2 mr-2">close</button>
            <button wire:click="save" class="rounded-full bg-gray-900 text-white px-4 py-2">complete</button>
        </div>
    </div>
</div>