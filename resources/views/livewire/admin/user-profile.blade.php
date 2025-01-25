<div>   
    <div class="bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">       
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{$user->name}} Profile
        </h3>      
    </div>
    <div class="bg-white px-4 sm:p-6">
        <div class="space-y-6">
            <div class="grid grid-cols-2 gap-x-3 h-36">
                    <div>
                       <div class="rounded-full text-center">
                            @if ($photo)
                            Photo Preview:
                            <img class="rounded-full mx-auto mt-2" width="100" height="100" src="{{ $photo->temporaryUrl() }}">
                            @else
                                <img class="rounded-full mx-auto mt-2"  width="100" height="100" src="{{url('storage/'.($user->profile_photo_path ? $user->profile_photo_path : 'profile-photos/user.png')) }}" alt="" >
                            @endif
                            @error('photo') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror            
                       </div>
                    </div>
                    <div>
                       <div class="flex flex-col justify-around">
                        <input type="file" placeholder="change" class="btn rounded-full" wire:model="photo">

                        @if ($user->profile_photo_path!=='profile-photos/userimg.jpg')
                          <button class="btn btn-secondary rounded-full mt-3" 
                          wire:click='$emit("openModal", "remove-image", 
                          @json([$user])'>
                          remove</button>
                        @endif
                       </div>
                    </div>
            </div>
            <div class="form-group">
                    <label for="name">{{__('Name')}}</label>
                    <input type="text" wire:model="name" class="form-control">
                    @error('name') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                    <label for="email">{{__('Email')}}</label>
                    <input type="text" wire:model="email" class="form-control">
                    @error('email') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="phone">{{__('Phone')}}</label>
                    <input type="text" wire:model="phone" class="form-control">
                    @error('phone') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Trading Status</label>
                    <select class="form-control" wire:model="trading_status">
                        <option value="">choose</option>
                        <option value="earning"  @if($trading_status=="earning") {{'selected'}} @endif>Active Trading</option>
                        <option value="active"  @if($trading_status=="active") {{'selected'}} @endif>Yet to trade</option>
                        <option value="not_earning"  @if($trading_status=="not_earning") {{'selected'}} @endif>Trading session completed</option>
                        <option value="dormant"  @if($trading_status=="dormant") {{'selected'}} @endif>Dormant</option>
                    </select>
                    @error('trading_status') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="percent">{{__('Investment progress')}}</label>
                    <input type="number" max="100" min="0" wire:model="percent" class="form-control">
                    @error('percent') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="ref_link">{{__('Upline')}}</label>
                    <input type="text" disabled class="form-control" value='{{ $user->upline->user->name ?? 'Member wasn\'t referred'}}'>
                </div>
                <div class="form-group">
                    <label for="ref_link">{{__('Referral Link')}}</label>
                    <input type="text" disabled class="form-control" value="{{$user->ref_link}}">
                </div>
                <hr><br><br>
                <p>Finance</p> 
                <div class="form-group">
                    <label for="">Total Funds</label>
                    <input type="text" wire:model="totBal" class="form-control">
                    @error('totBal') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror                    
                </div>               
                <div class="form-group">
                    <label for="">ROI</label>
                    <input type="text" wire:model="acROI" class="form-control">
                    @error('acROI') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror                    
                </div>
                <div class="form-group">
                    <label for="">Active Capital</label>
                    <input type="text" class="form-control" wire:model="acBal">
                    @error('acBal') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Dormant Funds</label>
                    <input type="text" wire:model="doBal" class="form-control">
                    @error('doBal') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror                    
                </div>
                <hr><br><br>
                <p>Contact Info</p>
                <div class="form-group">
                    <label for="">Occupation</label>
                    <input type="text" wire:model="occupation" class="form-control">
                    @error('occupation') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Marital Status</label>
                    <select class="form-control" wire:model="marital_status">
                        <option value="">choose</option>
                        <option value="married"  @if($marital_status=="married") {{'selected'}} @endif>married</option>
                        <option value="single"  @if($marital_status=="single") {{'selected'}} @endif>single</option>
                        <option value="divorced"  @if($marital_status=="divorced") {{'selected'}} @endif>divorced</option>
                    </select>
                    @error('marital_status') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Address</label>
                    <textarea rows="2" wire:model="address" class="form-control"></textarea>
                    @error('address') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
                </div>
                <div class="form-group">
                    <label for="">Country</label>
                    <input type="text" wire:model="country" class="form-control">
                    @error('country') <span class="alert bg-red-100 mt-2">{{ $message }}</span> @enderror
                </div>
        </div>
    </div>
   
    <div class="bg-white px-4 pb-5 sm:px-4 sm:flex">
        <button class="btn btn-secondary" wire:click="$emit('closeModal')">Close</button>
        <button class="btn btn-info ml-3" type="button" wire:click="submit">Save</button>
    </div>
</div>
