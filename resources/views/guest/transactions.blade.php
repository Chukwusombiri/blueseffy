<x-app-layout>
    <!-- Main Content Section -->
    <section class="bg-center bg-cover" style="background-image: url('/images/transaction.jpg')">
        <div class="py-16 px-2 md:px-8 bg-gray-900 bg-opacity-50" data-aos="fade-up">
            <h2 class="text-4xl font-bold text-center text-gray-100">Recent Transactions</h2>
            <p class="text-gray-100 text-base px-2 md:px-8 mt-4 md:w-[70%] mx-auto">A glimpse into our platform's financial activity. We prioritize privacy – transactions are shared with consent. Eager to learn more? Find out firsthand what our clients are saying on our <a href="{{ route('testimonials') }}" class="text-indigo-500 mr-2 hover:underline uppercase">Client Reviews <span aria-hidden="true">→</span></a> page."
            <div class="py-10">
                <div class="bg-white shadow-md rounded-lg overflow-x-auto">
                    <table class="w-full table-auto">
                        <thead>
                            <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                                <th class="py-3 px-6 text-left">Investor</th>
                                <th class="py-3 px-6 text-left">Value</th>
                                <th class="py-3 px-6 text-left">Asset</th>
                                <th class="py-3 px-6 text-left">Type</th>
                                <th class="py-3 px-6 text-left">Date</th>
                            </tr>
                        </thead>
                        <tbody class="text-gray-600 text-sm font-light">
                            @foreach ($faketrans as $faketran)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex flex-col items-center">
                                            <img src="{{ url('storage/' . $faketran->photo_path) }}" alt="investor"
                                                class="w-12 h-12 rounded-full">
                                            <h6 class="text-gray-600 uppercase mt-1">{{ $faketran->name }}</h6>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left">${{ $faketran->amount }}</td>
                                    <td class="py-3 px-6 text-left uppercase">{{ $faketran->currency }}</td>
                                    <td class="py-3 px-6 text-left uppercase font-semibold">
                                        {{ $faketran->transaction }}</td>
                                    <td class="py-3 px-6 text-left">
                                        {{ date('M d, Y', strtotime($faketran->created_at)) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

{{-- contact us --}}
<div class="bg-gray-900 bg-opacity-70 py-8">
    <div class="container mx-auto text-center">
        <h2 class="text-2xl font-semibold text-white">Join Us Today!</h2>
        <p class="mb-4 mx-2 text-white">Do you want to join us today? Sign up and start your investment journey!</p>
        <x-secondary-link-button href="/signup">Sign Up</x-secondary-link-button>
    </div>
    <div class="container mx-auto text-center mt-8">
        <h2 class="text-2xl font-semibold text-white">Contact Us</h2>
        <p class="mb-4 text-white">For further inquiries or assistance, don't hesitate to get in touch with us.</p>
        <x-secondary-link-button href="/contact-us" class="bg-indigo-500 text-white py-2 px-6 rounded-full inline-block hover:bg-indigo-600">Contact Us</x-secondary-link-button>
    </div>
</div>
    <!-- Related Links Section -->
    <section class="bg-gray-200 py-12">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center">Related Links</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Investment Plans</h3>
                    <p class="mb-4">Explore our investment plans to find the best fit for you.</p>
                    <a href="{{route('pricing')}}" class="text-indigo-600 hover:underline">View Plans</a>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">About {{config('app.name')}}</h3>
                    <p class="mb-4">Learn more about our company and mission.</p>
                    <a href="{{route('about')}}" class="text-indigo-600 hover:underline">Read More</a>
                </div>
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Contact Us</h3>
                    <p class="mb-4">Reach out to us for inquiries and assistance.</p>
                    <a href="{{route('contact')}}" class="text-indigo-600 hover:underline">Contact</a>
                </div>               
            </div>
        </div>
    </section>
    <x-footer></x-footer>
</x-app-layout>