<x-app-layout>
    <!-- Hero Section -->
    <section class="bg-cover bg-center text-white text-center"
        style="background-image: url('/images/projector/hero.jpg')">
        <div class="container mx-auto py-16 bg-gray-800 bg-opacity-50">
            <h1 class="text-4xl font-bold mb-4">{{config('app.name')}} Return on Investment Projector</h1>
            <p class="text-lg mb-8">Use our ROI projector to calculate your potential investment returns.</p>
        </div>
    </section>

    <!-- ROI Calculator Form Section -->
    <section class="py-12">
        @livewire('roi-projector')
    </section>

    <!-- Call to Action Section -->
    <section class="bg-gray-900 text-white text-center py-16">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4">Start Investing with {{config('app.name')}} Today!</h2>
            <p class="mb-8">Unlock the potential for exceptional investment returns.</p>
            <x-link-button href="{{route('user.investments')}}">Get
                Started</x-link-button>
        </div>
    </section>

    <!-- Client Reviews Section -->
    <section class="py-12">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center">Client Reviews</h2>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Client Review 1 -->
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <p class="mb-4">"{{config('app.name')}} helped me achieve impressive investment returns that I never thought
                        were possible."</p>
                    <p class="text-gray-600">- John Kingsley</p>
                </div>
                <!-- Client Review 2 -->
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <p class="mb-4">"Consistency is the key, and {{config('app.name')}}'s expert team consistently delivers
                        outstanding results."</p>
                    <p class="text-gray-600">- Annabel Smith</p>
                </div>
                <!-- Client Review 3 -->
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <p class="mb-4">"I'm truly amazed by the ROI I've achieved through {{config('app.name')}}'s strategic
                        investment advice."</p>
                    <p class="text-gray-600">- Michael Olmo</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Links Section -->
    <section class="bg-gray-200 py-12">
        <div class="container mx-auto">
            <h2 class="text-2xl font-bold mb-4 text-center">Related Links</h2>
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Related Link 1 -->
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Financial Markets</h3>
                    <p class="mb-4">Stay updated with latest market moves with our real-time charts and widgets, henceforth maximize your
                        returns.</p>
                    <a href="{{route('markets')}}" class="text-yellow-500 hover:underline">Read More</a>
                </div>
                <!-- Related Link 2 -->
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Risk Management</h3>
                    <p class="mb-4">Discover how {{config('app.name')}}'s risk management approach can protect your investments.
                    </p>
                    <a href="{{route('contact')}}" class="text-yellow-500 hover:underline">Read More</a>
                </div>
                <!-- Related Link 3 -->
                <div class="bg-white rounded-lg p-6 shadow-md">
                    <h3 class="text-lg font-bold mb-2">Client Success Stories</h3>
                    <p class="mb-4">Explore stories of clients who achieved remarkable results with {{config('app.name')}}.</p>
                    <a href="{{route('testimonials')}}" class="text-yellow-500 hover:underline">Read More</a>
                </div>
            </div>
        </div>
    </section>

    <x-footer></x-footer>
</x-app-layout>
<script>
  Livewire.on('roiProjectorSubmitted', (e) => {
      toastr.success('Congratulations! Our team will get in touch with you shortly.');
  })
</script>