<x-app-layout>
    <!-- ====== Page Title Section Start -->
    <section class="bg-white dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-6 md:px-8 py-20 border-b border-gray-300 dark:border-gray-700">
            <h2 class="mb-2 text-3xl font-semibold md:text-4xl text-gray-700 dark:text-gray-200">
                {{ config('app.name') }} Return on Investment Projector
            </h2>
            <p class="text-gray-600 dark:text-gray-400 text-md">
                Use our ROI projector to calculate your potential investment returns.
            </p>
        </div>
    </section>
    <!-- ROI Calculator Form Section -->
    <section class="bg-white dark:bg-gray-800 py-16">
        <div class="w-full max-w-6xl mx-auto px-6 md:px-8">
            @livewire('roi-projector')
        </div>
    </section>
    <!-- Call to Action Section -->
    <div class="bg-gray-900">
        <div class="w-full h-full max-w-6xl mx-auto flex flex-col gap-4 items-center py-20 px-6 md:px-8">
            <p class="text-gray-100 text-sm capitalize font-semibold text-indigo-600 dark:text-blue-500 tracking-wide">
                Start earning already</p>
            <h2 class="text-4xl md:text-5xl font-semibold text-gray-200">Start Investing Today</h2>
            <p class="text-lg text-gray-100">Unlock the potential for exceptional investment returns.</p>
            <a href="/register"
                class="text-gray-100 bg-indigo-600 dark:bg-blue-500 text-xs uppercase tracking-wide px-6 py-3 md:px-8 md:py-4 rounded-3xl hover:bg-indigo-700 dark:hover:bg-blue-700 transition-all ease-in-out duration-300">Invest
                now</a>
        </div>
    </div>
    <!-- Client Reviews Section -->
    <section class="py-20 bg-white dark:bg-gray-800">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <!-- Client Review 1 -->
                <div class="rounded-xl p-6 shadow shadow-gray-800 dark:shadow-gray-400 flex flex-col gap-4">
                    <p class="italic text-md text-gray-700 dark:text-gray-200">"{{ config('app.name') }} helped me
                        achieve impressive investment returns that I never thought
                        were possible."</p>
                    <div class="flex flex-col gap-1">
                        <p class="text-gray-600 text-gray-700 dark:text-gray-200 text-sm">- John Kingsley</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">- Businesss Executive (JohnKingley Inc.)</p>
                    </div>
                </div>
                <!-- Client Review 2 -->
                <div class="rounded-xl p-6 shadow shadow-gray-800 dark:shadow-gray-400 flex flex-col gap-4">
                    <p class="italic text-md text-gray-700 dark:text-gray-200">"Consistency is the key, and
                        {{ config('app.name') }}'s expert team consistently delivers
                        outstanding results."</p>
                    <div class="flex flex-col gap-1">
                        <p class="text-gray-600 text-gray-700 dark:text-gray-200 text-sm">- Annabel Smith</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">- Medical Doctor</p>
                    </div>
                </div>
                <!-- Client Review 3 -->
                <div class="rounded-xl p-6 shadow shadow-gray-800 dark:shadow-gray-400 flex flex-col gap-4">
                    <p class="italic text-md text-gray-700 dark:text-gray-200">"I'm truly amazed by the ROI I've
                        achieved through {{ config('app.name') }}'s strategic
                        investment advice."</p>
                    <div class="flex flex-col gap-1">
                        <p class="text-gray-600 text-gray-700 dark:text-gray-200 text-sm">- Michael Olmo</p>
                        <p class="text-gray-600 dark:text-gray-400 text-sm">- Chartered Accountant</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Related Links Section -->
    <section class="bg-white dark:bg-gray-800 py-20">
        <div class="max-w-6xl mx-auto px-6 md:px-8">
            <h2 class="text-2xl font-bold mb-4 text-gray-700 dark:text-gray-200">Related Links</h2>
            <div class="w-full max-w-lg flex flex-col gap-4 divide-y divide-gray-200 dark:divide-gray-600">
                <!-- Related Link 1 -->
                <a href="{{ route('markets') }}" class="text-gray-600 dark:text-gray-300 hover:underline flex flex-col">
                    <h3 class="text-lg font-medium text-indigo-600 dark:text-blue-500">Financial Markets</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 max-w-md">Stay updated with latest market moves
                        with our real-time charts and widgets, henceforth maximize your
                        returns.
                    </p>                    
                </a>
                <!-- Related Link 2 -->
                <a href="{{ route('contact') }}" class="pt-1 text-gray-600 dark:text-gray-300 hover:underline flex flex-col">
                    <h3 class="text-lg font-medium text-indigo-600 dark:text-blue-500">Risk Management</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 max-w-md">Discover how {{ config('app.name') }}'s
                        risk management approach can protect your investments.
                    </p>
                </a>
                <!-- Related Link 3 -->
                <a href="{{ route('testimonials') }}" class="pt-1 text-gray-600 dark:text-gray-300 hover:underline flex flex-col">
                    <h3 class="text-lg font-medium text-indigo-600 dark:text-blue-500">Client Success Stories</h3>
                    <p class="text-sm text-gray-600 dark:text-gray-400 max-w-md">Explore stories of clients who achieved
                        remarkable results with {{ config('app.name') }}.</p>
                </a>
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
