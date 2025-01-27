<div class="container py-4">
    <h2 class="text-lg text-gray-700 text-center">Edit withdrawal for member</h2>
    @if (session()->has('result'))
        <div class="w-full md:w-3/4 mx-auto mb-2 text-red-500 mt-2">
            {{ session('result') }}
        </div>
    @endif
    <div class="w-full md:w-3/4 mx-auto mb-2">
        <label for="" class="form-label">Wallet</label>
        <select wire:model="user_wallet_id" class="form-control px-2 py-2 rounded-lg">
            @foreach ($wallets as $wallet)
                <option value="{{ $wallet->id }}" @if ($user_wallet_id == $wallet->id) {{ 'selected' }} @endif>
                    {{ $wallet->name }}</option>
            @endforeach
        </select>
        @error('user_wallet_id')
            <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="w-full md:w-3/4 mx-auto mb-2">
        <button
            onclick="Livewire.emit('openModal','admin.add-user-wallet', {{ json_encode(['id' => $withdrawal->user_id]) }} )"
            class="btn rounded-full bg-info px-3 hover:bg-transfer hover:text-dark">Add New Wallet</button>
    </div>
    <div class="w-full md:w-3/4 mx-auto mb-2">
        <label for="" class="form-label">Amount to Withdraw</label>
        <input type="number" wire:model="amount" class="form-control px-2 py-2 rounded-lg">
        @error('amount')
            <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="w-full md:w-3/4 mx-auto mb-2">
        <label for="date">Date</label>
        <input type="date" wire:model="date" class="form-control px-2 py-2 rounded-lg">
        @error('date')
            <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="flex flex-row justify-end w-3/4 mx-auto p-2">
        <button onclick="Livewire.emit('closeModal')"
            class="btn rounded-full bg-secondary px-3 mr-2 hover:bg-transfer hover:text-dark">close</button>
        <button wire:click="save"
            class="btn rounded-full bg-info px-3 hover:bg-transfer hover:text-dark">complete</button>
    </div>
</div>
