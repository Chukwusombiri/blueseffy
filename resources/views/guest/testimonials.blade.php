<x-app-layout>
    <!-- ====== Page Title Section Start -->
    <section class="bg-center bg-cover" style="background-image: url('/images/page-header.jpg')">
        <div class="px-6 md:px-8 py-[70px] backdrop-blur-sm bg-gray-900/50">
            <div class="max-w-6xl mx-auto border-b border-gray-500">
                <h2 class="mb-2 text-3xl md:text-4xl font-semibold text-gray-200">
                    What Have Been Said
                </h2>
                <p class="text-white mb-6 text-md font-medium">
                    Our members only has good and interesting stories to tell since they joined {{ config('app.name') }}
                </p>
            </div>
        </div>
    </section>
    <!-- ====== Services Section Start -->
    <section class="bg-white dark:bg-gray-800 pt-20 pb-12">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <h2 class="text-gray-700 dark:text-gray-200 mb-6 text-3xl font-semibold sm:text-4xl">
                Testimonials
            </h2>
            <div class="flex flex-wrap">
                {{-- INDIVIDUAL TESTIMONIAL --}}
                @if (count($testimonials) > 0)
                    @foreach ($testimonials as $testimonial)
                        <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                            <div
                                class="mb-8 rounded-xl border border-indigo-600 dark:border-gray-600 p-6 flex flex-col">
                                <img src="{{ url('storage/' . $testimonial->testifier_img) }}" alt="testifier photo"
                                    class="w-14 h-14 rounded-full mb-4">
                                <h4 class="text-gray-700 dark:text-gray-200 mb-1 text-xl font-semibold">
                                    {{ $testimonial->testifier }}
                                </h4>
                                <p class="text-gray-600 dark:text-gray-400 text-md mb-2">
                                    {{ $testimonial->testifier_job }}</p>
                                <p class="text-gray-600 dark:text-gray-400">
                                    {{ $testimonial->testimony }}.
                                </p>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{-- END INDIVIDUAL TESTIMONIAL --}}
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
