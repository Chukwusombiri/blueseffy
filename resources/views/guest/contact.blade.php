<x-app-layout>
    <!-- ====== Page Title Section Start -->
    <section class="bg-cover bg-center" style="background-image: url('images/customer_service.jpg')">
        <div class="h-[70vh] md:min-h-[40vh] md:max-h-[60vh] bg-gray-900/20 backdrop-blur-sm flex justify-center">
            <div class="w-full h-full max-w-6xl px-6 md:px-8 flex items-center justify-center">
                <div class="w-full max-w-xl border-b py-10">
                    <h2 class="mb-4 text-4xl md:text-5xl font-bold text-white capitalize text-center">
                        We are always available
                    </h2>
                    <p class="text-white text-sm font-medium text-center">
                        Our dedicated and passionate team are always available to offer assistance. Talk to us now and
                        we will respond to you with solutions.
                    </p>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Contact Section Start -->
    <section class="overflow-hidden bg-white dark:bg-gray-800 py-20 lg:py-[120px]">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="flex flex-wrap justify-between">
                <div class="w-full lg:w-1/2">
                    <div class="mb-10 lg:mb-0">
                        <h2 class="text-gray-700 dark:text-gray-200 mb-8 text-3xl md:text-4xl font-semibold uppercase">
                            GET IN TOUCH WITH US
                        </h2>
                        <div class="flex flex-col gap-4">
                            <div class="w-full flex items-center gap-2 md:gap-3 lg:pr-4">
                                <svg class="w-10 h-10 stroke-indigo-600 dark:stroke-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                                    height="24" stroke-width="2">
                                    <path d="M4 21v-15c0 -1 1 -2 2 -2h5c1 0 2 1 2 2v15"></path>
                                    <path d="M16 8h2c1 0 2 1 2 2v11"></path>
                                    <path d="M3 21h18"></path>
                                    <path d="M10 12v0"></path>
                                    <path d="M10 16v0"></path>
                                    <path d="M10 8v0"></path>
                                    <path d="M7 12v0"></path>
                                    <path d="M7 16v0"></path>
                                    <path d="M7 8v0"></path>
                                    <path d="M17 12v0"></path>
                                    <path d="M17 16v0"></path>
                                </svg>
                                <div class="w-full">
                                    <h4 class="text-gray-700 dark:text-gray-200 mb-1 text-xl font-semibold">Office
                                        Address</h4>
                                    <p class="text-md text-gray-600 dark:text-gray-300">
                                        {{ $company->address }}
                                    </p>
                                </div>
                            </div>
                            <div class="w-full flex items-center gap-2 md:gap-3 lg:pr-4">
                                <svg class="w-10 h-10 stroke-indigo-600 dark:stroke-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                                    height="24" stroke-width="2">
                                    <path
                                        d="M5 4h4l2 5l-2.5 1.5a11 11 0 0 0 5 5l1.5 -2.5l5 2v4a2 2 0 0 1 -2 2a16 16 0 0 1 -15 -15a2 2 0 0 1 2 -2">
                                    </path>
                                    <path d="M15 9l5 -5"></path>
                                    <path d="M15 5l0 4l4 0"></path>
                                </svg>
                                <div class="w-full">
                                    <h4 class="text-gray-700 dark:text-gray-200 mb-1 text-xl font-semibold">Phone Number
                                    </h4>
                                    <p class="text-md text-gray-600 dark:text-gray-300">{{ $company->tel }}</p>
                                </div>
                            </div>
                            <div class="w-full flex items-center gap-2 md:gap-3 lg:pr-4">
                                <svg class="w-10 h-10 stroke-indigo-600 dark:stroke-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                                    height="24" stroke-width="2">
                                    <path d="M17 12a2 2 0 1 0 4 0a9 9 0 1 0 -2.987 6.697"></path>
                                    <path d="M12 12m-5 0a5 5 0 1 0 10 0a5 5 0 1 0 -10 0"></path>
                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                    <path d="M12 12m-1 0a1 1 0 1 0 2 0a1 1 0 1 0 -2 0"></path>
                                </svg>
                                <div class="w-full">
                                    <h4 class="text-gray-700 dark:text-gray-200 mb-1 text-xl font-semibold">Email
                                        Address</h4>
                                    <p class="text-md text-gray-600 dark:text-gray-300">{{ $company->email }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <h4 class="text-2xl font-semibold text-gray-700 dark:text-gray-300 mb-6 text-center">Send us an
                        email</h4>
                    @livewire('contact-us')
                </div>
            </div>
        </div>
    </section>
    <!-- ====== FAQ Section Start -->
    <section class="relative overflow-hidden bg-white dark:bg-gray-800 pt-20 pb-16 lg:pt-[120px] lg:pb-[90px]">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <h2 class="mb-8 text-3xl font-bold text-gray-700 dark:text-gray-200 md:text-4xl text-center">
                Any Questions? Look Here
            </h2>
            <div x-data="{ activeFaq: null }" class="flex flex-wrap">
                {{-- INDIVIDUAL FAQ HALF --}}
                <div class="w-full lg:w-1/2 flex flex-col gap-4 lg:pr-4">
                    @if (count($firstfaqs) > 0)
                        @foreach ($firstfaqs as $first)
                            <div
                                class="w-full flex flex-col rounded-lg border border-gray-300 dark:border-gray-600 px-4">
                                <button
                                    x-on:click="activeFaq = (activeFaq === '{{ $first->id }}' ? null : '{{ $first->id }}')"
                                    class="w-full flex justify-between gap-4 items-center flex-nowrap py-4">
                                    <span class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                        {{ $first->question }}
                                    </span>
                                    <svg class="w-5 h-5 text-gray-800 dark:text-gray-100"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        width="24" height="24" stroke-width="2">
                                        <path d="M6 9l6 6l6 -6"></path>
                                    </svg>
                                </button>
                                <div x-show="activeFaq === '{{ $first->id }}'" x-collapse
                                    class="border-t border-gray-200 dark:border-gray-600 py-4">
                                    <p class="text-sm text-gray-600 dark:text-gray-300 leading-loose">
                                        {{ $first->answer }}.
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>

                {{-- ANOTHER INDIVIDUAL FAQ HALF --}}
                <div class="w-full lg:w-1/2 flex flex-col gap-4 lg:pl-4">
                    @if (count($secondfaqs) > 0)
                        @foreach ($secondfaqs as $second)
                            <div
                                class="w-full flex flex-col rounded-lg border border-gray-300 dark:border-gray-600 px-4">
                                <button
                                    x-on:click="activeFaq = (activeFaq === '{{ $second->id }}' ? null : '{{ $second->id }}')"
                                    class="w-full flex justify-between gap-4 items-center flex-nowrap py-4">
                                    <span class="text-lg font-semibold text-gray-800 dark:text-gray-100">
                                        {{ $second->question }}
                                    </span>
                                    <svg class="w-5 h-5 text-gray-800 dark:text-gray-100"
                                        xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                        stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        width="24" height="24" stroke-width="2">
                                        <path d="M6 9l6 6l6 -6"></path>
                                    </svg>
                                </button>
                                <div x-show="activeFaq === '{{ $second->id }}' " x-collapse
                                    class="border-t border-gray-200 dark:border-gray-600 py-4">
                                    <p class="text-sm text-gray-600 dark:text-gray-300 leading-loose">
                                        {{ $second->answer }}.
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
    </section>
    {{-- NEED HELP --}}
    <section class="bg-white dark:bg-gray-800 py-20">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <h2 class="text-indigo-600 dark:text-gray-100 text-2xl font-extrabold">For more assistance</h2>
            <div class="flex flex-wrap mt-8">
                <div class="w-full md:w-1/3 mb-4 md:mb-0 md:px-6">
                    <p class="text-xl font-semibold text-gray-700 dark:text-gray-100 capitalize mb-4">24/7 Chat Support
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Chat with our friendly live customer
                        service
                        agent through the on-page chat widget</p>
                </div>

                <div class="w-full md:w-1/3 mb-4 md:mb-0 md:px-6">
                    <p class="text-xl font-semibold text-gray-700 dark:text-gray-100 capitalize mb-4">Frequently asked
                        questions</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Learn answers to frequently asked question
                        about {{ config('app.name') }}</p>
                    <div class="flex">
                        <a href="{{ route('faqs') }}"
                            class="text-sm font-semibold text-indigo-600 dark:text-blue-500 transform transition hover:translate-x-1">Learn
                            more</a>
                    </div>
                </div>

                <div class="w-full md:w-1/3 mb-4 md:mb-0 md:px-6">
                    <p class="text-xl font-semibold text-gray-700 dark:text-gray-100 capitalize mb-4">Educatives and
                        insights</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Stay up to date with the latest stories
                        and
                        commentary.</p>
                    <div class="flex">
                        <a href="{{ route('articles') }}"
                            class="text-sm font-semibold text-indigo-600 dark:text-blue-500 transform transition hover:translate-x-1">Learn
                            more</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer></x-footer>
</x-app-layout>

<script>
    Livewire.on('contactedUs', (e) => {
        toastr.success('Thank you for contacting us!')
    })
</script>
