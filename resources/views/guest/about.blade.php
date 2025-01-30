<x-app-layout>
    <!-- ====== Page Title Section Start -->
    <section class="bg-white dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-6 md:px-8 py-20 border-b border-gray-300 dark:border-gray-700">
            <h2 class="mb-2 text-3xl font-semibold md:text-4xl text-gray-700 dark:text-gray-200">
                About {{ config('app.name') }}
            </h2>
            <p class="text-gray-600 dark:text-gray-400 text-md">
                Learn more about us. Why investors choose us. Know what other investors have said about
                {{ config('app.name') }}.
                See our stats.
            </p>
        </div>
    </section>
    <!-- ====== About Section Start -->
    <section class="py-20 bg-white dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="w-full h-auto md:h-[70vh]">
                    <img src="{{ url('images/trading.jpg') }}" alt="" class="w-full h-full rounded-xl" />
                </div>
                <div class="w-full">
                    <h2 class="text-gray-700 dark:text-gray-200 mb-4 text-3xl font-semibold md:text-4xl">
                        Why Choose Us
                    </h2>
                    <p
                        class="text-gray-800 dark:text-gray-100 mb-8 block text-md font-semibold tracking-wide capitalize">
                        A Place Where Every Investor Feels Appreciated.
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-loose mb-2">
                        {{ config('app.name') }} is a financial assets management and development organization. We're
                        managing and
                        controlling financial and digital assets belonging to wealthy minority of the world's
                        population. We started
                        off as a financial manager, secured and protected clients from bankruptcy and gradually garnered
                        enough experience
                        and human capital thereby boosting quality number of financial analysts, Asset managers and data
                        scientist. We
                        make us of the high-level technologies thereby relaibly securing investors funds and daily
                        profits.
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-sm leading-loose mb-6">
                        {{ config('app.name') }} faciliates thousands of daily transaction through digital assets and
                        fiat thereby
                        allowing room for flexibility and speed of operations.
                    </p>
                    <div>
                        <a href="{{ route('certificate') }}"
                            class="inline-flex items-center gap-1 text-sm text-indigo-600 dark:text-blue-500 underline hover:no-underline">
                            <span class="capitalize font-semibold">View certificate</span>
                            <svg class="w-5 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                                height="24" stroke-width="2">
                                <path d="M5 12l14 0"></path>
                                <path d="M15 16l4 -4"></path>
                                <path d="M15 8l4 4"></path>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Brands Section Start -->
    <section class="bg-center bg-cover" style="background-image: url('/images/investment.jpg')">
        <div class="bg-gray-900 bg-opacity-80 py-20">
            <div class="max-w-4xl mx-auto px-6 md:px-8 grid grid-cols-1 md:grid-cols-3 gap-6">
                <div
                    class="flex flex-col items-center gap-3 border-b border-gray-300 pb-6 md:pb-0 md:border-transparent">
                    <h2 class="text-4xl md:text-6xl font-bold text-gray-100">
                        {{ number_format($company->active_accounts) }}</h2>
                    <span class="text-gray-50 text-md font-semibold">Active Investors</span>
                </div>
                <div
                    class="flex flex-col items-center gap-3 border-b border-gray-300 pb-6 md:pb-0 md:border-transparent">
                    <h2 class="text-4xl md:text-6xl font-bold text-gray-100">
                        $18M+</h2>
                    <span class="text-gray-50 text-md font-semibold">Active Deposits</span>
                </div>
                <div class="flex flex-col items-center gap-3">
                    <h2 class="text-4xl md:text-6xl font-bold text-gray-100">
                        $10M+</h2>
                    <span class="text-gray-50 text-md font-semibold">Funds withdrawn</span>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Cards Section Start -->
    <section class="bg-white dark:bg-gray-800 py-20">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="flex flex-wrap justify-center">
                <div class="w-full px-4 md:w-1/2">
                    <div class="mb-8 rounded-lg border border-indigo-600 dark:border-gray-600 p-8">
                        <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 capitalize">Our Vision</h3>
                        <p class="text-md text-gray-600 dark:text-gray-400 leading-relaxed mt-4 md:mt-6">
                            We aim to change the perception and stereotypes surrounding financial investments and
                            financial instruments as a risky investment
                            that will always lead to losses and nothing good can come out of it for an individual
                            investor.
                        </p>
                    </div>
                </div>
                <div class="w-full px-4 md:w-1/2">
                    <div class="mb-8 rounded-lg border border-indigo-600 dark:border-gray-600 p-8">
                        <h3 class="text-2xl font-semibold text-gray-800 dark:text-gray-100 capitalize">Our Mission</h3>
                        <p class="text-md text-gray-600 dark:text-gray-400 leading-relaxed mt-4 md:mt-6">
                            {{ config('app.name') }} wants to give every individual, firm or community a chance at
                            the financial
                            markets and to have good stories to tell
                            afterwards. To help everyone have a say on the financial markets and how it governs our
                            livelihood.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Team Section Start -->
    <section class="bg-white dark:bg-gray-800 pt-20 pb-10" id="team">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="mx-auto mb-10 max-w-[510px] text-center">
                <h2 class="text-gray-700 dark:text-gray-200 text-3xl font-semibold sm:text-4xl">
                    Who works for us
                </h2>                
            </div>
            <div class="flex flex-wrap justify-center">
                @if ($members)
                    @foreach ($members as $member)
                        <div class="w-full px-4 md:w-1/2 lg:w-1/3 xl:w-1/4">
                            <div class="mx-auto mb-6 w-full max-w-[370px]">
                                <div class="relative overflow-hidden rounded-lg">
                                    <img src="{{ url('storage/' . $member->team_img) }}" alt="image"
                                        class="w-full" />
                                    <div class="absolute bottom-5 left-0 w-full">
                                        <div class="relative mx-5 overflow-hidden rounded-lg backdrop-blur-sm bg-white/20 dark:bg-gray-800/40 py-5 px-3 text-center">
                                            <h3 class="text-gray-700 dark:text-gray-100 text-md font-semibold">{{ $member->name }}</h3>
                                            <p class="text-gray-600 dark:text-gray-200 text-sm">{{ $member->position }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{-- END OF INDIVIDUAL TEAM --}}
            </div>
        </div>
    </section>
    <!-- ====== Blog Section Start -->
    <section class="bg-white dark:bg-gray-800 py-24">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="mx-auto mb-10 max-w-[510px] text-center lg:mb-20">
                <h2 class="text-gray-700 dark:text-gray-200 mb-4 text-3xl font-semibold sm:text-4xl">
                    Insights: Recent Articles
                </h2>
                <p class="text-gray-800 dark:text-gray-100 text-md leading-relaxed">
                    Read through our articles and so many others to stay informed with the developments in the markets.
                </p>
            </div>
            <div class="flex flex-wrap justify-center">
                {{-- individual article --}}
                @if (count($articles) > 0)
                    @foreach ($articles as $article)
                        <div class="w-full px-4 md:w-1/2 lg:w-1/3">
                            <div class="mb-10 mx-auto max-w-[370px]">
                                <div class="rounded w-full h-auto md:h-96 overflow-hidden">
                                    <img src="{{ asset('storage/' . $article->cover_img) }}" alt="image"
                                        class="w-full h-full" />
                                </div>
                                <div class="flex flex-col gap-5">
                                    <span class="text-indigo-600 text-xs tracking-wide uppercase dark:text-blue-500">
                                        {{ date('M d, y', strtotime($article->created_at)) }}
                                    </span>
                                    <a href="javascript:void(0)"
                                        class="w-full text-gray-700 dark:text-gray-100 hover:underline text-lg leading-loose">
                                        {{ $article->title }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                {{-- ends individual article --}}
            </div>
        </div>
    </section>
    <x-footer></x-footer>
</x-app-layout>
