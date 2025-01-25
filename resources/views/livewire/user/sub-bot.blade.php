<div class="max-w-3xl mx-auto">
    @if (session('error'))
        <div>{{session('error')}}</div>
    @endif
    <div class="relative z-20 flex"> 
        <div class="w-full flex flex-col items-center">
            <div class="w-full">
                <div class="my-2 bg-white rounded-lg">
                    <select wire:model="selectedWalletId" class="rounded-xl py-3 px-6 border border-white focus:border-white hover:border-white outline-none w-full text-gray-800">
                        <option value="">select payment method</option>  
                        @foreach ($wallets as $item)
                            <option value="{{$item->id}}"  class="p-4 border-transparent bg-white">{{$item->name}}</option>
                        @endforeach                  
                    </select>
                </div>
                @error('selectedWalletId')
                    <div class="text-sm font-semibold text-rose-600">{{$message}}</div>
                @enderror
            </div>            
        </div>           
    </div>
    <div class="relative z-20 flex justify-center mt-6">
        <button wire:click="submit" class="rounded-xl text-white bg-gray-900 px-6 py-3 font-semibold text-sm hover:bg-gray-800 shadow outline-none border-0">complete purchase</button>
    </div>
</div>