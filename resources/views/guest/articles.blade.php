<x-app-layout>
    <!-- ====== Page Title Section Start -->
    <section class="bg-center bg-cover" style="background-image: url('/images/page-header.jpg')">
        <div class="px-6 md:px-8 py-[70px] backdrop-blur-sm bg-gray-900/50">
            <div class="max-w-6xl mx-auto border-b border-gray-500">
                <h2 class="mb-2 text-3xl md:text-4xl font-semibold text-gray-200 capitalize">
                    Market Insights
                </h2>
                <p class="text-white mb-6 text-md font-medium">
                    Stay informed with recent events in the financial markets and learn more
                </p>
            </div>
        </div>
    </section>
    <!-- ====== Page Title Section End -->
    <section class="bg-white dark:bg-gray-800 pt-20 pb-12">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="flex flex-wrap gap-3 mb-8">
                <h2 class="text-gray-800-600 dark:text-gray-100 text-md mb-3 capitalize">News Category</h2>
                <div class="relative w-full md:max-w-[250px]" x-data="{
                    open: false
                }" x-on:click.away="open = false">
                    <button x-on:click="open = ! open"
                        class="w-full px-4 py-1 border border-indigo-600 dark:border-blue-500 text-gray-700 dark:text-gray-200 text-sm outline-none hover:border-2 flex items-center justify-between rounded-lg">
                        <span>Select topic</span>
                        <svg class="w-5 h-5" x-bind:class="open && 'rotate-180'" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" width="24" height="24" stroke-width="2">
                            <path d="M6 9l6 6l6 -6"></path>
                        </svg>
                    </button>
                    <div x-show="open"
                        class="absolute top-full w-full mt-1 z-30 bg-white shadow dark:bg-gray-800 dark:border dark:border-gray-700 rounded-lg p-2">
                        <h6
                            class="text-sm text-gray-600 dark:text-gray-400 pb-2 border-b border-gray-300 dark:border-gray-700">
                            All Categories</h6>
                        <ul class="list-none space-y-2 pt-2" role="listbox">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('articles', [$category->id]) }}"
                                        class="text-sm text-gray-800 dark:text-gray-100">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 justify-center gap-6">
                @if (count($articles) > 0)
                    @foreach ($articles as $article)
                        <a href="{{ route('readarticle', [$article->id]) }}" class="flex flex-col gap-4">
                            <img src="/storage/{{ $article->cover_img }}" class="w-full h-auto md:h-[400px]"
                                alt="blog">
                            <div class="w-full gap-1">
                                <h4 class="text-xl font-semibold text-gray-800 dark:text-gray-100">{{ $article->title }}
                                </h4>
                                <p class="text-xs font-medium text-gray-600 dark:text-gray-400 uppercase">Published:
                                    {{ date('M d, y', strtotime($article->created_at)) }}</p>
                            </div>
                        </a>
                    @endforeach
                @else
                    <p class="md:col-span-2 lg:col-span-3 flex justify-center items-center gap-3">
                        <span class="text-lg text-gray-600 md:text-gray-400">Oops!! No insights to show at this time,
                            please come back later.</span>
                        <svg class="w-10 h-10 text-gray-600 md:text-gray-400" xmlns="http://www.w3.org/2000/svg"
                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" width="24" height="24" stroke-width="2">
                            <path d="M8 4h1l3 3h7a2 2 0 0 1 2 2v8m-2 2h-14a2 2 0 0 1 -2 -2v-11a2 2 0 0 1 1.189 -1.829">
                            </path>
                            <path d="M3 3l18 18"></path>
                        </svg>
                    </p>
                @endif
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
