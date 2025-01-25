<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-cover bg-center text-white text-center" style="background-image:url('/images/ukrain.jpg')">
        <div class="container mx-auto py-16 bg-gray-800 bg-opacity-50">
            <h1 class="text-4xl font-bold mb-4">Investment Measures and Support</h1>
            <p class="text-lg mb-8">Discover our commitment to secure and successful investments for Ukrainian investors.
            </p>
        </div>
    </section>
    <!-- {{config('app.name')}} Investment Measures for Ukrainians and Ukrainian Assets Section -->
    <section class="py-12">
        <div class="container mx-auto px-2 md:px-4">
            <h2 class="text-2xl font-bold mb-6 text-center">Our Investment Measures for Ukrainians and Ukrainian Assets
            </h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Localized Research</h3>
                    <p class="mb-4">Our research focuses on Ukrainian economic trends, providing insights for informed
                        investment decisions.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Sustainable Growth</h3>
                    <p class="mb-4">We prioritize investments that contribute to the sustainable growth of Ukrainian
                        businesses and industries.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Collaborative Approach</h3>
                    <p class="mb-4">We collaborate with local partners and stakeholders to create synergistic
                        investment strategies.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Currency Hedging</h3>
                    <p class="mb-4">We implement currency hedging strategies to mitigate exchange rate risks
                        associated with Ukrainian assets.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Long-Term Vision</h3>
                    <p class="mb-4">Our investment plans are designed with a long-term vision, aligning with Ukraine's
                        economic development goals.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Transparent Reporting</h3>
                    <p class="mb-4">We provide regular and transparent performance reports to keep Ukrainian investors
                        informed about their portfolios.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- {{config('app.name')}} Support for Ukrainian Investors Section -->
    <section class="bg-gray-200 py-12">
        <div class="container mx-auto px-2 md:px-4">
            <h2 class="text-2xl font-bold mb-6 text-center">{{config('app.name')}} Support for Ukrainian Investors</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Local Seminars and Workshops</h3>
                    <p class="mb-4">We organize educational events in Ukraine to enhance your investment knowledge and
                        skills.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Investment Resources</h3>
                    <p class="mb-4">Access exclusive investment resources tailored to Ukrainian investors for informed
                        decision-making.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">24/7 Customer Support</h3>
                    <p class="mb-4">Our customer support is available around the clock to assist you with any
                        inquiries or concerns.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Local Advisory Team</h3>
                    <p class="mb-4">Our dedicated local advisors offer personalized assistance for Ukrainian
                        investors.</p>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Language Support</h3>
                    <p class="mb-4">Communicate in Ukrainian with our support team for clear and effective assistance.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Call to Action Section -->
    <section class="bg-gray-900 text-white text-center py-16">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Have Questions or Ready to Invest?</h2>
            <p class="mb-8">Contact our experts today for personalized guidance and information.</p>
            <x-link-button href="{{route('contact')}}">Get in
                Touch</x-link-button>
        </div>
    </section>

    <!-- Related Links Section -->
    <section class="bg-gray-200 py-12">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center">Related Links</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">About {{config('app.name')}}</h3>
                    <p class="mb-4">Learn more about our company and mission.</p>
                    <a href="{{route('about')}}" class="text-yellow-600 hover:underline">Read More</a>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Contact Us</h3>
                    <p class="mb-4">Reach out to us for inquiries and assistance.</p>
                    <a href="{{route('contact')}}" class="text-yellow-600 hover:underline">Contact</a>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Investment Plans</h3>
                    <p class="mb-4">Explore our investment plans to find the best fit for you.</p>
                    <a href="{{route('pricing')}}" class="text-yellow-600 hover:underline">View Plans</a>
                </div>
            </div>
        </div>
    </section>
    <x-footer></x-footer>
</x-app-layout>
