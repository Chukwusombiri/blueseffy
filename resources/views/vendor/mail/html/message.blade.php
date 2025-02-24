<x-mail::layout>
    {{-- Header --}}
    <x-slot:header>
        <x-mail::header :url="config('app.url')">
            <h2
                style="
                    display: flex;
                    align-items: center;
                    flex-wrap: wrap;
                    font-family: 'Sora', sans-serif;
                    font-size: 1.25rem;
                    text-transform: capitalize;
                    color: #2563eb;
                    letter-spacing: 0.025em;
                ">
                <img src="{{ asset('images/blues_dark.png') }}"
                    alt="App logo" style="width: 2.5rem; height: 2.5rem; margin-right: 0.25rem;"
                >
                <span>Blues</span>
                <span>efficiency</span>
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
