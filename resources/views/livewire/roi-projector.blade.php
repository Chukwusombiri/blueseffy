<div class="container mx-auto px-2 md:px-4">
    <h2 class="text-2xl font-bold mb-4 text-center">Calculate Your Investment Returns</h2>
    <form class="max-w-lg mx-auto">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="full_name">Full Name</label>
            <input
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                type="text" id="full_name" wire:model="name" required>
                <x-jet-input-error for="name" class="mt-2"/>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email Address</label>
            <input
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                type="email" id="email" wire:model="email" required>
                <x-jet-input-error for="email" class="mt-2"/>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">Amount Intended to
                Invest</label>
            <input
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                type="number" id="amount" wire:model="amount" required>
                <x-jet-input-error for="amount" class="mt-2"/>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="rate">Rate</label>
            <select
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                id="rate" wire:model="rate" required>
                <option value="days" selected>Days</option>
                <option value="weeks">Weeks</option>
                <option value="months">Months</option>
                <option value="years">Years</option>
            </select>
            <x-jet-input-error for="rate" class="mt-2"/>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="duration">Duration</label>
            <input
                class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300"
                type="number" id="duration" wire:model="duration" required>
                <x-jet-input-error for="duration" class="mt-2"/>
        </div>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="comments">Additional Comments</label>
            <textarea class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring focus:border-blue-300" id="comments"
                wire:model="comment" rows="4"></textarea>
                <x-jet-input-error for="comment" class="mt-2"/>
        </div>
        <button wire:click.prevent="submit"
            class="w-full bg-indigo-500 text-sm tracking-wider font-semibold text-gray-100 uppercase py-2 px-4 rounded-lg hover:bg-indigo-600 transition duration-300"
            type="submit">Submit</button>
    </form>
</div>
