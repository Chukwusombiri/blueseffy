<div class="w-full max-w-6xl mx-auto px-6">
    <div class="mb-6 flex flex-wrap lg:flex-nowrap justify-between">
        <div class="mb-4 lg:mb-0 flex flex-col gap-1">
            <h2 class="text-gray-700 dark:text-gray-300 text-2xl capitalize">My wallets</h2>
            <p class="text-gray-600 dark:text-gray-400 text-sm">
                Yet to add your withdrawal wallets? Simply click <span
                    class="captialize font-semibold text-gray-800 dark:text-gray-300">add wallet</span>, enter wallet
                name, wallet address and save.
            </p>
        </div>
        <button wire:click="$emit('openModal','admin.add-user-wallet', {{ json_encode(['id' => $user->id]) }} )"
            class="border border-indigo-600 dark:border-blue-500 hover:border-2 text-gray-800 dark:text-gray-100 px-6 py-2 md:px-7 rounded-xl">
            Add Wallet
        </button>
    </div>
    <div>
        <div class="overflow-x-auto">
            <table class="w-full table-auto text-left">
                <thead>
                    <tr class="border-0 border-b border-gray-200 dark:border-gray-700">
                        @php
                            $headerClasses =
                                'text-xs uppercase text-gray-600 dark:text-gray-400 font-semibold tracking-wide p-2';
                            $contentClasses =
                                'text-sm capitalize text-gray-800 dark:text-gray-200 p-2';
                        @endphp
                        <th class="{{ $headerClasses }}">ID</th>
                        <th class="{{ $headerClasses }}">Name</th>
                        <th class="{{ $headerClasses }}">Address</th>
                        <th class="{{ $headerClasses }}">Added</th>
                        <th class="{{ $headerClasses }}">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($wallets as $w => $wallet)
                        <tr class=" hover:bg-gray-100 dark:hover:bg-gray-900 border-0 border-b border-gray-200 dark:border-gray-700">
                            <td class="{{ $contentClasses }}">{{ $w + 1 }}</td>
                            <td class="{{ $contentClasses }}">{{ $wallet->name }}</td>
                            <td class="{{ $contentClasses }}">{{ $wallet->address }}</td>
                            <td class="{{ $contentClasses }}">{{ date('M d, Y', strtotime($wallet->created_at)) }}
                            </td>
                            <td class="{{ $contentClasses }} flex flex-wrap gap-4">
                                <button wire:click="$emit('openModal','admin.edit-user-wallet', {{ json_encode(['id' => $wallet->id]) }} )"
                                    class="text-blue-600 hover:underline uppercase font-semibold text-xs tracking-wide">EDIT</button>
                                <button wire:click="deleteWallet('{{ $wallet->id }}')"
                                    class="text-rose-600 hover:underline text-xs font-semibold tracking-wide uppercase">DELETE</button>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
