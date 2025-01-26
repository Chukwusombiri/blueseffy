<div>
    <div class="bg-white p-4 sm:px-6 sm:py-4 border-b border-gray-150">
        <h3 class="text-lg leading-6 font-medium text-gray-900">
            {{ $user->name }} Profile
        </h3>
    </div>
    <div class="bg-white px-4 sm:p-6">
        <div class="space-y-6">
            <div class="flex flex-col gap-4">
                <div class="w-full flex flex-col gap-3">
                    @if ($photo)
                        <span class="text-gray-700 text-sm">Photo Preview:</span>
                        <img class="rounded-full h-32 w-32" src="{{ $photo->temporaryUrl() }}" alt="Photo preview">
                    @else
                        <span class="text-gray-700 text-sm">Profile photo:</span>
                        <img class="rounded-full h-32 w-32"
                            src="{{ url('storage/' . ($user->profile_photo_path ? $user->profile_photo_path : 'profile-photos/user.png')) }}"
                            alt="Profile photo">
                    @endif
                </div>
                <div>
                    <div class="flex flex-wrap gap-3 items-start">
                        <div class="flex flex-col">
                            <input type="file" class="hidden" placeholder="change" id="changephoto"
                                class="btn rounded-full" wire:model="photo">
                            <label for="changePhoto"
                                class="rounded-full border-2 border-gray-700 text-gray-700 text-sm uppercase px-4 py-2 md:px-8 transform transition-all ease-in-out duration-300 hover:-translate-y hover:bg-gray-100 cursor-pointer">change</label>
                            @error('photo')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>
                        @if ($user->profile_photo_path !== 'profile-photos/user.png')
                            <button
                                class="border-2 border-red-500 uppercase px-4 py-2 md:px-8 text-red-500 rounded-full text-sm transform transition-all ease-in-out duration-300 hover:-translate-y hover:bg-gray-100"
                                wire:click="$emit('openModal', 'admin.remove-image', {{ json_encode(['id' => $user->id]) }} )">
                                Remove
                            </button>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="name">{{ __('Name') }}</label>
                <input type="text" wire:model="name" class="form-control">
                @error('name')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="email">{{ __('Email') }}</label>
                <input type="text" wire:model="email" class="form-control">
                @error('email')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="phone">{{ __('Phone') }}</label>
                <input type="text" wire:model="phone" class="form-control">
                @error('phone')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Trading Status</label>
                <select class="form-control" wire:model="trading_status">
                    <option value="">choose</option>
                    <option value="earning" @if ($trading_status == 'earning') {{ 'selected' }} @endif>Active Trading
                    </option>
                    <option value="active" @if ($trading_status == 'active') {{ 'selected' }} @endif>Yet to trade
                    </option>
                    <option value="not_earning" @if ($trading_status == 'not_earning') {{ 'selected' }} @endif>Trading
                        session completed</option>
                    <option value="dormant" @if ($trading_status == 'dormant') {{ 'selected' }} @endif>Dormant
                    </option>
                </select>
                @error('trading_status')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="percent">{{ __('Investment progress') }}</label>
                <input type="number" max="100" min="0" wire:model="percent" class="form-control">
                @error('percent')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="ref_link">{{ __('Upline') }}</label>
                <input type="text" disabled class="form-control"
                    value='{{ $user->upline->user->name ?? 'Member wasn\'t referred' }}'>
            </div>
            <div class="form-group">
                <label for="ref_link">{{ __('Referral Link') }}</label>
                <input type="text" disabled class="form-control" value="{{ $user->ref_link }}">
            </div>
            <hr><br><br>
            <p>Finance</p>
            <div class="form-group">
                <label for="">Total Funds</label>
                <input type="text" wire:model="totBal" class="form-control">
                @error('totBal')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">ROI</label>
                <input type="text" wire:model="acROI" class="form-control">
                @error('acROI')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Active Capital</label>
                <input type="text" class="form-control" wire:model="acBal">
                @error('acBal')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Dormant Funds</label>
                <input type="text" wire:model="doBal" class="form-control">
                @error('doBal')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <hr><br><br>
            <p>Contact Info</p>
            <div class="form-group">
                <label for="">Occupation</label>
                <input type="text" wire:model="occupation" class="form-control">
                @error('occupation')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Marital Status</label>
                <select class="form-control" wire:model="marital_status">
                    <option value="">choose</option>
                    <option value="married" @if ($marital_status == 'married') {{ 'selected' }} @endif>married
                    </option>
                    <option value="single" @if ($marital_status == 'single') {{ 'selected' }} @endif>single
                    </option>
                    <option value="divorced" @if ($marital_status == 'divorced') {{ 'selected' }} @endif>divorced
                    </option>
                </select>
                @error('marital_status')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Address</label>
                <textarea rows="2" wire:model="address" class="form-control"></textarea>
                @error('address')
                    <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Country</label>
                <input type="text" wire:model="country" class="form-control">
                @error('country')
                    <span class="alert bg-red-100 mt-2">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="bg-white px-4 pb-5 sm:px-4 sm:flex">
        <button class="btn btn-secondary" wire:click="$emit('closeModal')">Close</button>
        <button class="btn btn-info ml-3" type="button" wire:click="submit">Save</button>
    </div>
</div>
