<x-app-layout>
    <!-- ====== Page Title Section Start -->
    <section class="bg-white dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-6 md:px-8 py-20 border-b border-gray-300 dark:border-gray-700">
            <h2 class="mb-2 text-3xl font-semibold md:text-4xl text-gray-700 dark:text-gray-200">
                Our Pricing
            </h2>
            <p class="text-gray-600 dark:text-gray-400 text-md">
                See our pricing list below. Flexible pricing and daily income accrual for all pricing.
            </p>
        </div>
    </section>
    <!-- ====== Pricing Section Start -->
    <section class="bg-white dark:bg-gray-800 relative overflow-hidden pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="mx-auto mb-10 max-w-md text-center">
                <h2 class="text-gray-700 dark:text-gray-200 mb-4 text-3xl font-semibold md:text-4xl">Pricing Table</h2>
                <p class="text-gray-600 dark:text-gray-400 text-md">
                    Do you have difficulty choosen a plan? Speak to our live agents through our Live chat widget or send
                    us an email at <a href="mailto:{{ config('mail.from.address') }}"
                        class="text-indigo-600 dark:text-blue-500 hover:underline">{{ config('mail.from.address') }}</a>
                </p>
            </div>
            <div class="flex flex-wrap justify-center">
                @if (count($plans) > 0)
                    @foreach ($plans as $plan)
                        {{-- INDIVIDUAL PLANS --}}
                        <div class="w-full p-4 md:w-1/2 lg:w-1/3">
                            <div
                                class="relative border border-indigo-600 dark:border-gray-400 overflow-hidden rounded-xl p-6">
                                <h4 class="text-indigo-600 dark:text-blue-500 mb-4 text-lg font-semibold uppercase">
                                    {{ $plan->name }}
                                </h4>
                                <h2 class="text-gray-700 dark:text-gray-200 mb-4 text-2xl font-semibold">
                                    {{ $plan->interest }}%
                                    <span class="text-md font-semibold tracking-wide">
                                        / {{ $plan->duration }} @if ($plan->duration == 1)
                                            {{ 'day' }}@else{{ 'days' }}
                                        @endif
                                    </span>
                                </h2>
                                <p
                                    class="text-gray-700 dark:text-gray-200 mb-4 border-b border-gray-300 dark:border-gray-600 pb-4 text-md">
                                    Plan limits: minimum deposits of ${{ $plan->min }} and maximum deposits of
                                    ${{ $plan->max }}.
                                </p>
                                <div class="mb-6">
                                    <p class="text-gray-700 dark:text-gray-200 mb-1 text-md">
                                        Affilaite bonus : {{ $plan->ref_commission }}%
                                    </p>
                                    <p class="text-gray-700 dark:text-gray-200 mb-1 text-md flex gap-2 items-center">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg>
                                        <span>Lifetime access</span>
                                    </p>
                                    <p class="text-gray-700 dark:text-gray-200 mb-1 text-md flex gap-2 items-center">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg>
                                        <span>Access to expert guidance</span>
                                    </p>
                                    <p class="text-gray-700 dark:text-gray-200 mb-1 text-md flex gap-2 items-center">
                                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                            fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-linejoin="round" width="24" height="24" stroke-width="2">
                                            <path d="M5 12l5 5l10 -10"></path>
                                        </svg>
                                        <span>Auto re-invest returns</span>
                                    </p>
                                </div>
                                <a href="{{ route('user.investment.create', [$plan->id]) }}"
                                    class="block text-indigo-600 dark:text-blue-500 hover:text-white dark:hover:text-white border border-indigo-600 dark:border-blue-500 hover:border-indigo-600 dark:hover:border-blue-500 bg-transparent hover:bg-indigo-600 dark:hover:bg-blue-500 rounded-xl p-4 text-center text-xs uppercase font-semibold tracking-wide transition">
                                    Choose {{ $plan->name }}
                                </a>
                            </div>
                        </div>
                        {{-- END OF INDIVIDUAL PLAN --}}
                    @endforeach
                @endif
            </div>
        </div>
    </section>
    <!-- ====== Testimonials Section Start -->
    <section class="bg-center bg-cover" style="background-image: url('/images/auth3.jpeg')">
        <div class="bg-gray-800 bg-opacity-60 py-20 px-6 md:px-8">
            <div class="max-w-6xl mx-auto px-6 md:px-8">
                <div x-data="{
                    slides: [],
                    currentIndex: 0,
                
                    init() {
                        this.slides = [...this.$refs.carousel.children];
                        this.centerFirstSlide();
                    },
                
                    centerFirstSlide() {
                        this.$nextTick(() => {
                            const carousel = this.$refs.carousel;
                            if (this.slides.length > 0) {
                                const firstSlide = this.slides[this.currentIndex];
                                carousel.scrollLeft = firstSlide.offsetLeft - (carousel.clientWidth / 2) + (firstSlide.clientWidth / 2);
                            }
                        });
                    },
                
                    scroll(direction) {
                        const carousel = this.$refs.carousel;
                        const slideWidth = this.slides[0]?.offsetWidth || 0;
                
                        if (direction === 'next' && this.currentIndex < this.slides.length - 1) {
                            this.currentIndex++;
                        } else if (direction === 'prev' && this.currentIndex > 0) {
                            this.currentIndex--;
                        }
                
                        carousel.scrollTo({
                            left: this.slides[this.currentIndex].offsetLeft - (carousel.clientWidth / 2) + (slideWidth / 2),
                            behavior: 'smooth'
                        });
                    }
                }" x-init="init()">
                    <div class="relative w-full overflow-x-hidden">
                        <div class="snap-x flex justify-center flex-nowrap overflow-x-auto transition-all scroll-smooth"
                            x-ref="carousel">
                            <!-- START OF INDIVIDUAL TESTIMONY -->
                            @if (count($testimonials) > 0)
                                @foreach ($testimonials as $testimonial)
                                    <div class="relative z-10 snap-center shrink-0 w-full md:w-1/2 lg:w-1/3 px-4">
                                        <div class="w-full flex flex-col gap-4">
                                            <div class="w-20 h-20 rounded-full">
                                                <img src="{{ url('storage/' . $testimonial->testifier_img) }}"
                                                    alt="image" class="w-full h-full rounded-full" />
                                            </div>
                                            <div class="w-full">
                                                <p class="text-gray-200 mb-6 text-sm italic">
                                                    {{ $testimonial->testimony }}
                                                </p>
                                                <h4 class="text-gray-200 text-md font-semibold mb-1">
                                                    {{ $testimonial->testifier }}
                                                </h4>
                                                <p class="text-gray-300 text-sm capitalize">
                                                    {{ $testimonial->testifier_job }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                            <!-- END OF INDIVIDUAL TESTIMONY -->
                        </div>

                        <!-- Navigation Buttons -->
                        <div class="mt-4 flex items-center justify-center gap-2">
                            <!-- Previous Button -->
                            <button
                                class="text-indigo-600 hover:bg-indigo-600 shadow p-4 inline-flex items-center justify-center rounded-full bg-gray-200 dark:bg-gray-900"
                                x-on:click="scroll('prev')">
                                <svg class="w-6 h-6 text-indigo-600 dark:text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                                    height="24" stroke-width="2">
                                    <path d="M15 6l-6 6l6 6"></path>
                                </svg>
                            </button>

                            <!-- Next Button -->
                            <button
                                class="text-indigo-600 hover:bg-indigo-600 shadow p-4 inline-flex items-center justify-center rounded-full bg-gray-200 dark:bg-gray-900"
                                x-on:click="scroll('next')">
                                <svg class="w-6 h-6 text-indigo-600 dark:text-blue-500"
                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                                    stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24"
                                    height="24" stroke-width="2">
                                    <path d="M9 6l6 6l-6 6"></path>
                                </svg>
                            </button>
                        </div>
                    </div>
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
    <x-footer></x-footer>
</x-app-layout>
