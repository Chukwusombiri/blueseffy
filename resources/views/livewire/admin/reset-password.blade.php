<div>   
    <div class="bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">       
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            Change Member Password
        </h3>      
    </div>
    <div class="bg-white px-4 sm:p-6">
        <div class="py-4">                       
            <div class="form-group">
                <label for="password">Password</label>
                <input id="password" name="password" class="form-control" type="password" wire:model="password" required autocomplete="new-password">
                @error('password') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
              </div>                
              <div class="form-group">
                  <label for="password_confirmation">Confirm Password</label>
                  <input id="password_confirmation" name="password_confirmation" class="form-control" type="password" wire:model="password_confirmation" required>
                  @error('password_confirmation') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
              </div>  
        </div>
    </div>
   
    <div class="bg-white px-4 pb-5 sm:px-4 sm:flex">
        <button class="btn btn-secondary" wire:click="$emit('closeModal')">Close</button>
        <button class="btn btn-info ml-3" type="button" wire:click="save">Save</button>
    </div>
</div>
