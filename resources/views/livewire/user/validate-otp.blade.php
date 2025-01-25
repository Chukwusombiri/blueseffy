<div>
    <div class="container py-4">
        <div>
            <h2 class="md:text-lg ml-4 text-dark-700 text-center">Validate Withdrawal</h2>
        </div>
        <div class="w-3/4 mx-auto mb-2">
            @if (session()->has('result'))
                <div class="bg-red-100 mt-2 p-2">
                    {{ session('result') }}
                </div>
            @endif
        </div>        
        <div class="w-10/12 mx-auto mb-2 grid grid-cols-6 gap-2">
            <label for="otp" class="col-span-6">Enter OTP</label>
            <input type="number" wire:model="otp" class="col-span-6 rounded-md">
            <button class="col-span-6 px-2 py-1 bg-gray-800 text-white rounded-md hover:bg-gray-500" wire:click="send">
                {{$sent!=='sent'? 'REQUEST OTP':'REQUEST NEW OTP'}}
            </button>
            @if ($sent=='sent')
                <p class="col-span-6 bg-green-100 px-4 py-2 rouunded-md">One Time password was sent to your email address</p>                
            @endif
            @error('otp')
               <span class="col-span-6 bg-red-100 mt-2 p-2">{{$message}}</span> 
            @enderror
        </div> 
              
                     
        <div class="flex justify-end items-center p-7">
            <button onclick="Livewire.emit('closeModal')"
             class="bg-gray-500 text-white rounded-full px-4 py-2 mr-2">close</button>
            <button wire:click="save" class="bg-indigo-400 rounded-full bg-info px-4 py-2 text-white">submit</button>
        </div>
    </div>
</div>
