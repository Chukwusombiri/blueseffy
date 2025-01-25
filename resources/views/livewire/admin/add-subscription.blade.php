<div>
    <div class="form-row relative">
        <div class="relative form-group col-md-6">
            <label for="username">Select investor</label>
            <input id="username" wire:model="search" class="form-control" required placeholder="search user by name"/>
            @if (count($users)>0)
            <div class="absolute top-100 z-10 w-full pt-2 overflow-auto">
                <div class="w-full max-h-[400px] bg-gray-100 shadow border border-gray-200 rounded overflow-auto">
                    <ul class="w-full">
                        @foreach ($users as $u)
                        <li class="w-full p-2 cursor-pointer hover:bg-gray-200" wire:click="selectUser('{{$u->id}}')">{{$u->name}}</li>
                        @endforeach
                    </ul>                    
                </div>
            </div>
            @else
            <div class="hidden"></div>
            @endif            
        </div>
        <div class="form-group col-md-6">
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
        <div class="form-group col-md-6">
            <label for="price">Price</label>
            <input type="number"
                class="form-control @error('price') is-invalid @enderror"
                id="price" wire:model="price" required>

            @error('price')
                <div class="bg-red-100 mt-2 p-2">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group col-md-6">
            <label for="multiplier">Multiplier</label>
            <input type="number"
                class="form-control @error('multiplier') is-invalid @enderror"
                id="multiplier" wire:model="multiplier" required>

            @error('multiplier')
                <div class="bg-red-100 mt-2 p-2">{{ $message }}</div>
            @enderror
        </div>        
        <div class="form-group col-md-6">
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
        <div class="form-group col-md-6">
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
        <div class="form-group col-md-6">
            <label for="" class="form-label">Days Left</label>
            <input type="number" wire:model="days_left" class="form-control px-2 py-2 rounded-lg">
            @error('days_left')
                <span class="bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>        
        <div class="col-md-6">
            <button wire:click="save" class="btn btn-primary w-100">Create subscription</button>
        </div>
    </div>
</div>