<div class="w-full flex flex-col gap-6">
    <h2 class="text-2xl font-semibold mb-4 text-center text-gray-700 dark:text-gray-200">Calculate Investment Returns
    </h2>
    <form class="w-full grid grid-cols-1 md:grid-cols-6 gap-x-4 gap-y-6 md:gap-y-8" wire:submit.prevent="submit">
        <div class="md:col-span-3 flex flex-col gap-1">
            <label class="text-gray-600 dark:text-gray-400 text-sm mb-2 tracking-wide" for="full_name">Full Name</label>
            <input
                class="w-full px-4 py-2 bg-transparent text-gray-800 dark:text-gray-100 tracking-wide border border-gray-300 focus:border-indigo-600 dark:border-gray-600 focus:border-blue-600 rounded-lg focus:outline-none ring-0 focus:ring-0 placeholder:text-sm placeholder:text-gray-600 dark:placeholder:text-gray-500"
                type="text" id="full_name" wire:model="name" placeholder="Type full name" required>
            <x-jet-input-error for="name" class="mt-2" />
        </div>
        <div class="md:col-span-3 flex flex-col gap-1">
            <label class="text-gray-600 dark:text-gray-400 text-sm mb-2 tracking-wide" for="email">Email
                Address</label>
            <input
                class="w-full px-4 py-2 bg-transparent text-gray-800 dark:text-gray-100 tracking-wide border border-gray-300 focus:border-indigo-600 dark:border-gray-600 focus:border-blue-600 rounded-lg focus:outline-none ring-0 focus:ring-0 placeholder:text-sm placeholder:text-gray-600 dark:placeholder:text-gray-500"
                type="email" id="email" wire:model="email" placeholder="Type Email address" required>
            <x-jet-input-error for="email" class="mt-2" />
        </div>
        <div class="md:col-span-2 flex flex-col gap-1">
            <label class="text-gray-600 dark:text-gray-400 text-sm mb-2 tracking-wide" for="amount">Amount Intended to
                Invest</label>
            <input
                class="w-full px-4 py-2 bg-transparent text-gray-800 dark:text-gray-100 tracking-wide border border-gray-300 focus:border-indigo-600 dark:border-gray-600 focus:border-blue-600 rounded-lg focus:outline-none ring-0 focus:ring-0 placeholder:text-sm placeholder:text-gray-600 dark:placeholder:text-gray-500"
                type="number" id="amount" wire:model="amount" placeholder="Type an amount" required>
            <x-jet-input-error for="amount" class="mt-2" />
        </div>
        <div class="md:col-span-2 flex flex-col gap-1">
            <label class="text-gray-600 dark:text-gray-400 text-sm mb-2 tracking-wide" for="rate">Rate</label>
            <select
                class="w-full px-4 py-2 bg-transparent text-gray-800 dark:text-gray-100 tracking-wide border border-gray-300 focus:border-indigo-600 dark:border-gray-600 focus:border-blue-600 rounded-lg focus:outline-none ring-0 focus:ring-0 placeholder:text-sm placeholder:text-gray-600 dark:placeholder:text-gray-500"
                id="rate" wire:model="rate" placeholder="Select investment rate" required>
                <option value="days" selected>Days</option>
                <option value="weeks">Weeks</option>
                <option value="months">Months</option>
                <option value="years">Years</option>
            </select>
            <x-jet-input-error for="rate" class="mt-2" />
        </div>
        <div class="md:col-span-2 flex flex-col gap-1">
            <label class="text-gray-600 dark:text-gray-400 text-sm mb-2 tracking-wide" for="duration">Duration</label>
            <input
                class="w-full px-4 py-2 bg-transparent text-gray-800 dark:text-gray-100 tracking-wide border border-gray-300 focus:border-indigo-600 dark:border-gray-600 focus:border-blue-600 rounded-lg focus:outline-none ring-0 focus:ring-0 placeholder:text-sm placeholder:text-gray-600 dark:placeholder:text-gray-500"
                type="number" id="duration" wire:model="duration" placeholder="Type investment duration" required>
            <x-jet-input-error for="duration" class="mt-2" />
        </div>
        <div class="md:col-span-6">
            <label class="text-gray-600 dark:text-gray-400 text-sm mb-2 tracking-wide" for="comments">Additional
                Comments</label>
            <textarea
                class="w-full px-4 py-2 bg-transparent text-gray-800 dark:text-gray-100 tracking-wide border border-gray-300 focus:border-indigo-600 dark:border-gray-600 focus:border-blue-600 rounded-lg focus:outline-none ring-0 focus:ring-0 placeholder:text-sm placeholder:text-gray-600 dark:placeholder:text-gray-500"
                id="comments" wire:model="comment" rows="4" placeholder="Type here..."></textarea>
            <x-jet-input-error for="comment" class="mt-2" />
        </div>
        <div class="md:col-span-6 flex justify-center pt-4">
            <button
                class="bg-indigo-600 dark:bg-blue-500 text-sm tracking-wider font-semibold text-gray-100 uppercase px-6 md:px-8 py-3 md:py-4 rounded-3xl hover:bg-indigo-700 dark:hover:bg-blue-700 transition-all ease-in-out duration-300"
                type="submit">Get result</button>
        </div>
    </form>
</div>
