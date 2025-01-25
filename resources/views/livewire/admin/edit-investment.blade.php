<div>
    <div class="container py-4">
        <div>
            <h2 class="md:text-lg ml-4 text-dark-700 text-center">Edit Investment</h2>
        </div>
        <div class="w-3/4 mx-auto mb-2">
            @if (session()->has('result'))
                <div class="bg-red-100 mt-2 p-2">
                    {{ session('result') }}
                </div>
            @endif
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Investment Plan</label>
            <select wire:model="plan_id" class="form-control px-2 py-2 rounded-lg">
                <option value="">select plan</option>
               @foreach ($plans as $plan)
                    <option value="{{$plan->id}}" @if($investment->plan_id==$plan->id) {{'selected'}} @endif wire:key="plan-{{ $plan->id }}">
                        {{$plan->name.': min|$'.$plan->min.' - max|$'.$plan->max}}</option>                   
               @endforeach
            </select>
            @error('plan_id')
               <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Investment Wallet</label>
            <select wire:model="wallet_id" class="form-control px-2 py-2 rounded-lg">
                <option value="">select wallet</option>
                <option value="Funding Wallet" @if($investment->wallet_id=='Funding wallet') {{'selected'}} @endif>Funding Wallet (value: ${{$user->doBal}})</option>
               @foreach ($wallets as $wallet)
                    <option value="{{$wallet->id}}" @if($investment->wallet_id==$wallet->id) {{'selected'}} @endif wire:key="wallet-{{ $wallet->id }}">{{$wallet->name}}</option>                   
               @endforeach
            </select>
            @error('wallet_id')
               <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>                 
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Amount</label>
            <input type="number" wire:model="amount" class="form-control px-2 py-2 rounded-lg">
            @error('amount')
                <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>               
        <div class="flex flex-row justify-end w-3/4 mx-auto p-2">
            <button onclick='Livewire.emit("closeModal")'
             class="btn rounded-full bg-secondary px-3 mr-2 hover:bg-transfer hover:text-dark">close</button>
            <button wire:click="save" class="btn rounded-full bg-info px-3 hover:bg-transfer hover:text-dark">complete</button>
        </div>
    </div>
</div>
