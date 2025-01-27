<x-mail::layout>
    {{-- Header --}}
    <x-slot:header>
        <x-mail::header :url="config('app.url')">
            <h2 style="display: flex; align-items: center; justify-content: center; gap: 0.5rem;">
                <span
                    style="background-color: #6610f2; border-radius: 9999px; color: #fff; padding: 0.6rem;">  
                    <img src="{{asset('images/handshake.png')}}" alt="" style="width: 1.75rem; height: 1.75rem;">                                          
                </span>
                <span style="text-transform: uppercase; color: #4f46e5; letter-spacing: 0.02em; font-size: 1.5rem; margin-left: 3px;">Bluesefficiency</span>
            </h2>
        </x-mail::header>
    </x-slot:header>

    {{-- Body --}}
    {{ $slot }}

    {{-- Subcopy --}}
    @isset($subcopy)
        <x-slot:subcopy>
            <x-mail::subcopy>
                {{ $subcopy }}
            </x-mail::subcopy>
        </x-slot:subcopy>
    @endisset

    {{-- Footer --}}
    <x-slot:footer>
        <x-mail::footer>
            © {{ date('Y') }} {{ config('app.name') }}. @lang('All rights reserved.')
        </x-mail::footer>
    </x-slot:footer>
</x-mail::layout>
