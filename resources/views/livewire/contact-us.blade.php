<div class="relative rounded-lg bg-white p-8 shadow-lg sm:p-12">
            
    <div class="mb-6">
      <input
      wire:model="subject"
        type="text"
        placeholder="Your Name"
        class="text-body-color border-[f0f0f0] focus:border-indigo-600 w-full rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
      />
      @error('subject') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
    </div>
    <div class="mb-6">
      <input
      wire:model="email"
        type="email"
        placeholder="Your Email"
        class="text-body-color border-[f0f0f0] focus:border-indigo-600 w-full rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
      />
      @error('email') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
    </div>
    <div class="mb-6">
      <input
        type="text"
        placeholder="Your Phone"
        class="text-body-color border-[f0f0f0] focus:border-indigo-600 w-full rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
      />
    </div>
    <div class="mb-6">
      <textarea
      wire:model="msg"
        rows="6"
        placeholder="Your Message"
        class="text-body-color border-[f0f0f0] focus:border-indigo-600 w-full resize-none rounded border py-3 px-[14px] text-base outline-none focus-visible:shadow-none"
      ></textarea>
      @error('msg') <span class="inline-block bg-red-100 mt-2 p-2">{{ $message }}</span> @enderror
    </div>
    @if ($response)
    <span class="block w-full bg-green-100 my-2 p-2">{{ 'Thank you for contacting us.' }}</span> 
    @endif
    
    <div>
      <button
        wire:click="submit"
        class="bg-indigo-600 border-indigo-600 w-full rounded border p-3 text-white transition hover:bg-opacity-90"
      >
        Send Message
      </button>
    </div>
 
  </div>