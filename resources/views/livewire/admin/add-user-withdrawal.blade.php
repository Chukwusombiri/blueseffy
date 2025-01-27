<div>
    <div class="px-4 py-4">
        <h2 class="text-lg text-gray-700 text-center">Create Withdrawal</h2>
        <div class="w-full md:w-3/4 mx-auto mb-2">
            @if (session()->has('result'))
                <div class="bg-red-100 mt-2 p-2">
                    {{ session('result') }}
                </div>
            @endif
        </div>
        <div class="w-full md:w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Wallet</label>
            <select wire:model="wallet_id" class="form-control px-2 py-2 rounded-lg">
                <option value="">select wallet</option>
                @foreach ($wallets as $wallet)
                    <option value="{{ $wallet->id }}">{{ $wallet->name }}</option>
                @endforeach
            </select>
            @error('wallet_id')
                <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="w-full md:w-3/4 mx-auto mb-2">
            <button onclick="Livewire.emit('openModal','admin.add-user-wallet', {{ json_encode(['id' => $user->id]) }} )"
                class="btn rounded-full bg-info px-3 hover:bg-transfer hover:text-dark">Add Wallet</button>
        </div>
        <div class="w-full md:w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Amount to Withdraw</label>
            <input type="number" wire:model="amount" class="form-control px-2 py-2 rounded-lg">
            @error('amount')
                <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
            @enderror
        </div>
        <div class="flex flex-row justify-end w-3/4 mx-auto p-2">
            <button onclick="Livewire.emit('closeModal')"
                class="btn rounded-full bg-secondary px-3 mr-2 hover:bg-transfer hover:text-dark">close</button>
            <button wire:click="submit"
                class="btn rounded-full bg-info px-3 hover:bg-transfer hover:text-dark">complete</button>
        </div>
    </div>
</div>
