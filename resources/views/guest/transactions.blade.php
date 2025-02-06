<x-app-layout>
    <!-- Main Content Section -->
    <section class="bg-center bg-cover" style="background-image: url('/images/transaction.jpg')">
        <div class="py-16 px-6 md:px-8 bg-gray-900 bg-opacity-50 backdrop-blur-sm" data-aos="fade-up">
            <div class="w-full max-w-6xl mx-auto px-6">
                <h2 class="text-4xl font-bold text-center text-gray-200">Recent Transactions</h2>
                <p class="text-gray-100 text-md mt-4 text-center max-w-sm mx-auto">
                    We prioritize privacy – transactions are shared with investor's consent. Find out firsthand what our
                    clients are
                    saying here. <a href="{{ route('testimonials') }}" class="text-blue-500 mr-2 hover:underline">Client
                        Reviews</a>
                </p>
                <div class="py-10">
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-x-auto">
                        <table class="w-full table-auto border-collapse">
                            <thead>
                                <tr class="bg-gray-200 dark:bg-gray-600 uppercase text-sm leading-normal">
                                    <th class="text-gray-600 dark:text-gray-400 py-3 px-6 text-center">Investor</th>
                                    <th class="text-gray-600 dark:text-gray-400 py-3 px-6 text-left">Value</th>
                                    <th class="text-gray-600 dark:text-gray-400 py-3 px-6 text-left">Asset</th>
                                    <th class="text-gray-600 dark:text-gray-400 py-3 px-6 text-left">Type</th>
                                    <th class="text-gray-600 dark:text-gray-400 py-3 px-6 text-left">Date</th>
                                </tr>
                            </thead>
                            <tbody class="text-sm font-light">
                                @foreach ($faketrans as $faketran)
                                    <tr
                                        class="border-b border-gray-200 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900">
                                        <td
                                            class="text-gray-600 dark:text-gray-300 py-3 px-6 text-left whitespace-nowrap">
                                            <div class="flex flex-col items-center">
                                                <img src="{{ url('storage/' . $faketran->photo_path) }}" alt="investor"
                                                    class="w-12 h-12 rounded-full">
                                                <h6 class="uppercase mt-1">{{ $faketran->name }}</h6>
                                            </div>
                                        </td>
                                        <td class="text-gray-600 dark:text-gray-300 py-3 px-6 text-left">
                                            ${{ $faketran->amount }}</td>
                                        <td class="text-gray-600 dark:text-gray-300 py-3 px-6 text-left uppercase">
                                            {{ $faketran->currency }}</td>
                                        <td
                                            class="text-gray-600 dark:text-gray-300 py-3 px-6 text-left uppercase font-semibold">
                                            {{ $faketran->transaction }}</td>
                                        <td class="text-gray-600 dark:text-gray-300 py-3 px-6 text-left">
                                            {{ date('M d, Y', strtotime($faketran->created_at)) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    {{-- contact us --}}
    <div class="bg-gray-800">
        <div class="w-full h-full max-w-6xl mx-auto flex flex-col gap-4 items-center py-20 px-6 md:px-8">
            <p class="text-gray-100 text-md">Join Us Today!</p>
            <h2 class="text-4xl md:text-5xl font-semibold text-gray-200">Do you want to join us today?</h2>
            <p class="text-lg text-gray-100">Sign up and start your investment journey!</p>
            <a href="/register"
                class="text-gray-100 bg-indigo-600 dark:bg-blue-500 text-xs uppercase tracking-wide px-6 py-3 md:px-8 md:py-4 rounded-3xl hover:bg-indigo-700 dark:hover:bg-blue-700 transition-all ease-in-out duration-300">Sign
                up now</a>
        </div>
    </div>
    <!-- Related Links Section -->
    <section class="bg-white dark:bg-gray-800 py-20">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <h2 class="text-indigo-600 dark:text-gray-100 text-2xl font-extrabold">Related Links</h2>
            <div class="flex flex-wrap mt-8">
                <div class="w-full md:w-1/3 mb-4 md:mb-0 md:px-6">
                    <p class="text-xl font-semibold text-gray-700 dark:text-gray-100 capitalize mb-4">Investment Pricing
                    </p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Explore our investment pricing packages to
                        find the best fit for you.</p>
                    <div class="flex">
                        <a href="{{ route('pricing') }}"
                            class="text-sm font-semibold text-indigo-600 dark:text-blue-500 transform transition hover:translate-x-1">
                            view pricing
                        </a>
                    </div>
                </div>

                <div class="w-full md:w-1/3 mb-4 md:mb-0 md:px-6">
                    <p class="text-xl font-semibold text-gray-700 dark:text-gray-100 capitalize mb-4">About
                        {{ config('app.name') }}</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">Get more in tune with all that
                        {{ config('app.name') }} is about, our business numbers, our mission and vision, who's in our
                        team.</p>
                    <div class="flex">
                        <a href="{{ route('about') }}"
                            class="text-sm font-semibold text-indigo-600 dark:text-blue-500 transform transition hover:translate-x-1">Learn
                            more</a>
                    </div>
                </div>

                <div class="w-full md:w-1/3 mb-4 md:mb-0 md:px-6">
                    <p class="text-xl font-semibold text-gray-700 dark:text-gray-100 capitalize mb-4">Contact Us</p>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mb-2">For further inquires into our services or
                        concerning your portfolio, don't hesitate to get in touch.</p>
                    <div class="flex">
                        <a href="{{ route('contact') }}"
                            class="text-sm font-semibold text-indigo-600 dark:text-blue-500 transform transition hover:translate-x-1">
                            Get in touch
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <x-footer></x-footer>
</x-app-layout>
