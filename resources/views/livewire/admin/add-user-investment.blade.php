<div>
    <div class="container py-4">
        <div>
            <h2 class="md:text-lg ml-4 text-dark-700 text-center">Investment</h2>
        </div>
        <div class="w-3/4 mx-auto mb-2">
            @if (session()->has('failure'))
                <div class="inline-block bg-red-100 mt-2 p-2 rounded-md">
                    {{ session('failure') }}
                </div>
            @endif
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Choose Plan</label>
            <select wire:model.defer="plan_id" class="form-control px-2 py-2 rounded-lg">
                <option value="">Select Plan</option>
                @foreach ($plans as $plan)
                    <option value="{{$plan->id}}" wire:key="plan-{{ $plan->id }}">{{$plan->name.': $'.$plan->min.' - $'.$plan->max}}</option>
                @endforeach
            </select>
            @error('plan_id')
                <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>       
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Wallet (optional)</label>
            <select wire:model.defer="wallet_id" class="form-control px-2 py-2 rounded-lg">
                <option value="">Select wallet</option>                
                @foreach ($wallets as $wallet)
                    <option value="{{$wallet->id}}" wire:key="wallet-{{ $wallet->id }}">{{$wallet->name}}</option>
                @endforeach
            </select>
            @error('wallet_id')
                <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Amount to Deposit</label>
            <input type="number" wire:model.defer="amount" class="form-control px-2 py-2 rounded-lg">
            @error('amount')
                <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>
        <div class="divider-sm-y"></div>
        <div class="flex flex-row justify-end w-3/4 mx-auto p-2">
            <button onclick="Livewire.emit('closeModal')" class="btn rounded-full bg-secondary px-3 mr-2 hover:bg-transfer hover:text-dark">close</button>
            <button wire:click="submit" class="btn rounded-full bg-info px-3 hover:bg-transfer hover:text-dark">save</button>
        </div>
    </div>
</div>
