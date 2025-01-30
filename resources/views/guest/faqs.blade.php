<x-app-layout>
    <!-- ====== Page Title Section Start -->
    <section class="bg-center bg-cover" style="background-image: url('/images/customer_service.jpg')">
        <div class="px-6 md:px-8 py-[70px] backdrop-blur-sm bg-gray-900/50">
            <div class="max-w-6xl mx-auto border-b border-gray-500">
                <h2 class="mb-2 text-3xl md:text-4xl font-semibold text-gray-200 capitalize">
                    Frequently asked questions
                </h2>
                <p class="text-white mb-6 text-md font-medium">
                    Learn more about {{ config('app.name') }} through our FAQs
                </p>
            </div>
        </div>
    </section>
    <!-- ====== FAQ Section Start -->
    <section class="bg-white dark:bg-gray-800 pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="mx-auto max-w-[520px] text-center lg:mb-10">
                <h2 class="mb-4 text-3xl font-semibold text-gray-700 dark:text-gray-200 sm:text-4xl capitalize">
                    FAQS and answers
                </h2>
                <p class="text-md text-gray-600 dark:text-gray-400">
                    If you have further inquiries don't hesitate to get in touch with us through Live Chat widget on the
                    page or send us an email at
                    <a href="mailto:{{ config('mail.from.address') }}"
                        class="text-indigo-600 dark:text-blue-500">{{ config('mail.from.address') }}</a>
                </p>
            </div>
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
    <!-- ====== Contact Section Start -->
    <section class="bg-white dark:bg-gray-800 py-20">
        <div class="max-w-6xl mx-auto px-6 md:px-8">            
            <div class="w-full max-w-xl mx-auto">                    
                <h2 class="text-center text-gray-700 dark:text-gray-200 mb-6 text-3xl md:text-4xl font-semibold capitalize">
                    Ask Your Question
                </h2>                
                @livewire('contact-us')
            </div>           
        </div>
    </section>
    <!-- ====== Call To Action Section Start -->
    <section class="py-20">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="bg-indigo-600 dark:bg-blue-500 rounded py-12 px-6">
                <div class="flex flex-wrap items-center">
                    <div class="w-full px-4 lg:w-1/2">
                        <span class="mb-2 text-base font-semibold text-white">
                            Become a huge profiter from the next big move through insiders tips
                        </span>
                        <h2 class="mb-6 text-3xl font-bold leading-tight text-white sm:mb-8 sm:text-[38px] lg:mb-0">
                            Get started today <br class="xs:block hidden" />
                            for free
                        </h2>
                    </div>
                    <div class="w-full px-4 lg:w-1/2 flex flex-wrap lg:justify-end gap-3">
                        <a href="{{ route('login') }}"
                            class="text-indigo-600 dark:text-blue-500 rounded-xl bg-white dark:bg-gray-800 py-4 px-8 text-sm tracking-wide capitalize font-medium transition dark:hover:bg-opacity-90">
                            Sign up now
                        </a>
                        <a href="{{ route('pricing') }}"
                            class="rounded-xl bg-gray-800 dark:bg-white py-4 px-8 text-sm font-medium text-white dark:text-blue-500 tracking-wide capitalize transition hover:bg-opacity-90">
                            Start earning
                        </a>
                    </div>
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
