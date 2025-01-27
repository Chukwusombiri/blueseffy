<div class="px-4 py-4">
    <h2 class="text-lg text-gray-700 text-center">Fiat Withdrawal for member</h2>
    @if (session()->has('failure'))
        <div class="w-full md:w-3/4 mx-auto mb-2 text-red-500 mt-2">
            {{ session('failure') }}
        </div>
    @endif
    <div class="w-full md:w-3/4 mx-auto mb-2">
        <label for="" class="form-label">Account Number</label>
        <input type="number" wire:model="account_no" class="form-control px-2 py-2 rounded-lg">
        @error('account_no')
            <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="w-full md:w-3/4 mx-auto mb-2">
        <label for="" class="form-label">Account Name</label>
        <input type="text" wire:model="account_name" class="form-control px-2 py-2 rounded-lg">
        @error('account_name')
            <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="w-full md:w-3/4 mx-auto mb-2">
        <label for="" class="form-label">Recipient Bank</label>
        <input type="text" wire:model="bank_name" class="form-control px-2 py-2 rounded-lg">
        @error('bank_name')
            <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="w-full md:w-3/4 mx-auto mb-2">
        <label for="" class="form-label">Routing Number</label>
        <input type="number" wire:model="routing_no" class="form-control px-2 py-2 rounded-lg">
        @error('routing_no')
            <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="w-full md:w-3/4 mx-auto mb-2">
        <label for="" class="form-label">Amount</label>
        <input type="number" wire:model="amount" class="form-control px-2 py-2 rounded-lg">
        @error('amount')
            <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
        @enderror
    </div>
    <div class="w-full md:w-3/4 mx-auto mb-2">
        <label for="" class="form-label">Description</label>
        <input type="text" wire:model="description" class="form-control px-2 py-2 rounded-lg">
        @error('description')
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
    <div class="divider-sm-y"></div>
    <div class="flex flex-row justify-end w-3/4 mx-auto p-2">
        <button onclick="Livewire.emit('closeModal')"
            class="btn rounded-full bg-secondary px-3 mr-2 hover:bg-transfer hover:text-dark">close</button>
        <button wire:click="submit"
            class="btn rounded-full bg-info px-3 hover:bg-transfer hover:text-dark">complete</button>
    </div>
</div>
