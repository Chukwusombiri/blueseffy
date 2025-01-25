<div>
    <div class="max-w-md mx-auto px-4 pt-4">      
          <div class="flex justify-start ">
            <label for="receipt" class="bg-gray-800 text-gray-100 font-bold mb-2 rounded shadow px-2 py-2 cursor-pointer">Select an image to upload</label>
            <input type="file" wire:model="receipt" id="receipt" class="hidden">                      
          </div>
          <x-jet-input-error for="receipt" class="mt-1 block"/> 
          @if ($receipt)
              <p>{{$receipt->getClientOriginalName();}}</p>
          @endif
          <div class="mt-4 mb-4">
            <p class="text-sm text-red-500"><strong>Warning:</strong> This action cannot be reversed.</p>
          </div>          
    </div>
    <div class="bg-gray-200 px-4 py-4"> 
      <div wire:loading.delay.long  wire:target="save" class="font-semibold text-center mb-2">
        Uploading image...
      </div>  
      <div class="flex justify-end">
        <button class="mr-2 bg-red-500 text-white hover:bg-red-700 px-2 py-2 rounded-lg" wire:click="$emit('closeModal')">Close</button>
        <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-lg" wire:click="save">
            Upload Receipt
        </button>
      </div>           
    </div>
</div>
