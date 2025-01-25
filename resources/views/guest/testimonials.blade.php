<x-app-layout>
    <!-- ====== Page Title Section Start -->
    <section class="shadow-md py-[70px]" id="mypage-header">
        <div class="mx-auto px-4 sm:container">
            <div class="border-stroke border-b stats-link">
                <h2 class="mb-2 text-2xl font-semibold text-white">
                    What Have Been Said?
                </h2>
                <p class="text-white mb-6 text-sm font-medium">
                    Our members only has good and interesting stories to tell since they joined BLUESSTECH Ltd.
                    Explore our pricing offers and you too will have good things to say about us afterwards.
                </p>
            </div>
        </div>
    </section>
    <!-- ====== Page Title Section End -->
    <!-- ====== Services Section Start -->
    <section class="pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
        <div class="mycontainer mx-auto">
            <div class="flex flex-wrap">
                <div class="w-full px-4">
                    <div class="mx-auto mb-12 max-w-[510px] text-center lg:mb-20">
                        <span class="text-indigo-600 mb-2 block text-lg font-semibold">
                            Testimonials
                        </span>
                        <h2 class="text-dark mb-4 text-3xl font-bold sm:text-4xl md:text-[40px]">
                            See for yourself what's been said
                        </h2>
                        <p class="text-body-color text-base">
                            We've maintained an incombatible level of transparency and integrity as an organization.
                            You've always shared our bad times - which has been
                            few - and also our good times - which has been at a consistent basis because of our experts
                            making use the necessary technologies needed.
                        </p>
                    </div>
                </div>
            </div>
            <div class="-mx-4 flex flex-wrap">
                {{-- INDIVIDUAL TESTIMONIAL --}}
                @if (count($testimonials) > 0)
                    @foreach ($testimonials as $testimonial)
                        <div class="w-full px-2 md:w-1/2 lg:w-1/3">
                            <div class="mb-8 rounded-[20px] bg-white p-10 shadow-md hover:shadow-lg md:px-7 xl:px-10">
                                <div class="mb-8 flex items-center justify-start">
                                    <img src="{{ url('storage/' . $testimonial->testifier_img) }}" alt="testifier photo"
                                        width="100" height="100" class="rounded-full">
                                </div>
                                <h4 class="text-dark mb-3 text-xl font-semibold">
                                    {{ $testimonial->testifier }} <br>
                                    <span class="text-slate-600">{{ $testimonial->testifier_job }}</span>
                                </h4>
                                <p class="text-body-color">
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
    <!-- ====== Services Section End -->
    <!-- ====== Call To Action Section Start -->
    <section>
        <div class="container mx-auto">
            <div class="bg-indigo-600 relative overflow-hidden rounded py-12 px-8 md:p-[70px] shadow-md">
                <div class="-mx-4 flex flex-wrap items-center">
                    <div class="w-full px-4 lg:w-1/2">
                        <span class="mb-2 text-base font-semibold text-white">
                            Become a huge profiter from the next big move throuh insiders tips
                        </span>
                        <h2 class="mb-6 text-3xl font-bold leading-tight text-white sm:mb-8 sm:text-[38px] lg:mb-0">
                            Get started with <br class="xs:block hidden" />
                            our free trial
                        </h2>
                    </div>
                    <div class="w-full px-4 lg:w-1/2">
                        <div class="flex flex-wrap lg:justify-end">
                            <a href="{{ route('login') }}"
                                class="hover:text-indigo-600 my-1 mr-4 inline-block rounded bg-white bg-opacity-[15%] py-4 px-6 text-base font-medium text-white transition hover:bg-opacity-100 md:px-9 lg:px-6 xl:px-9">
                                Get Pro Version
                            </a>
                            <a href="{{ route('login') }}"
                                class="my-1 inline-block rounded bg-[#13C296] py-4 px-6 text-base font-medium text-white transition hover:bg-opacity-90 md:px-9 lg:px-6 xl:px-9">
                                Start Free Trial
                            </a>
                        </div>
                    </div>
                </div>
                <div>
                    <span class="absolute top-0 left-0 z-[-1]">
                        <svg width="189" height="162" viewBox="0 0 189 162" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="16" cy="-16.5" rx="173" ry="178.5"
                                transform="rotate(180 16 -16.5)" fill="url(#paint0_linear)" />
                            <defs>
                                <linearGradient id="paint0_linear" x1="-157" y1="-107.754" x2="98.5011"
                                    y2="-106.425" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="white" stop-opacity="0.07" />
                                    <stop offset="1" stop-color="white" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </span>
                    <span class="absolute bottom-0 right-0 z-[-1]">
                        <svg width="191" height="208" viewBox="0 0 191 208" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <ellipse cx="173" cy="178.5" rx="173" ry="178.5"
                                fill="url(#paint0_linear)" />
                            <defs>
                                <linearGradient id="paint0_linear" x1="-3.27832e-05" y1="87.2457" x2="255.501"
                                    y2="88.5747" gradientUnits="userSpaceOnUse">
                                    <stop stop-color="white" stop-opacity="0.07" />
                                    <stop offset="1" stop-color="white" stop-opacity="0" />
                                </linearGradient>
                            </defs>
                        </svg>
                    </span>
                </div>
            </div>
        </div>
    </section>
    <!-- ====== Call To Action Section End -->
    {{-- NEED HELP --}}
    <section class="pt-20 pb-12 lg:pt-[120px] lg:pb-[90px]">
        <div class="mycontainer">
            <h2 class="text-indigo-600 text-2xl font-extrabold">Need Help ?</h2>
            <div class="flex flex-wrap justify-center pt-7">

                <div class="w-full py-7 md:w-1/3">
                    <p class="text-xl font-bold">24/7 Chat Support</p>
                    <p class="text-sm font-light">Get 24/7 chat support with our friendly customer service agents at
                        your service.</p>
                    <p><a href="javascript:void(0)" class="text-sm font-light text-indigo-600">Learn more</a></p>
                </div>

                <div class="w-full py-7 md:w-1/3">
                    <p class="text-xl font-bold">FAQs</p>
                    <p class="text-dark text-sm font-light">View FAQs for detailed instructions on specific features.
                    </p>
                    <p><a href="{{ route('faqs') }}" class="text-sm font-light text-indigo-600">Learn more</a></p>
                </div>

                <div class="w-full py-7 md:w-1/3">
                    <p class="text-xl font-bold">Educatives</p>
                    <p class="text-sm font-light">Stay up to date with the latest stories and commentary.</p>
                    <p><a href="{{ route('articles') }}" class="text-sm font-light text-indigo-600">Learn more</a></p>
                </div>
            </div>
        </div>
    </section>
    <x-footer></x-footer>
</x-app-layout>
