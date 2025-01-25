<div>
    <div class="container py-4">
        <div>
            <h2 class="md:text-lg ml-4 text-dark-700 text-center">add downline for member</h2>
        </div>
        <div class="w-3/4 mx-auto mb-2">
            @if (session()->has('failure'))
                <div class="inline-block bg-red-100 mt-2 p-2">
                    {{ session('failure') }}
                </div>
            @endif
        </div>
        <div class="w-3/4 mx-auto mb-2">
            <label for="" class="form-label">Downline</label>
            <select wire:model.defer="downline_id" class="form-control px-2 py-2 rounded-lg">
                <option value="">Select downline</option>
                @foreach ($downlines as $downline)
                    <option value="{{$downline->id}}" wire:key="downline-{{ $downline->id }}">{{$downline->name}}</option>
                @endforeach
            </select>
            @error('downline_id')
                <span class="inline-block bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div>                       
        <div class="divider-sm-y"></div>
        <div class="flex flex-row justify-end w-3/4 mx-auto p-2">
            <button onclick="Livewire.emit('closeModal')" class="btn rounded-full bg-secondary px-3 mr-2 hover:bg-transfer hover:text-dark">close</button>
            <button wire:click="save" class="btn rounded-full bg-info px-3 hover:bg-transfer hover:text-dark">save</button>
        </div>
    </div>
</div>
