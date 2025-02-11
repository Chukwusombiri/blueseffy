<div class="bg-white dark:bg-gray-800">
    <div class="overflow-x-auto">
        <table class="w-full table-auto text-left">
            <thead>
                <tr class="border-0 border-b border-gray-300 dark:border-gray-700">
                    <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Amount withdrawn</th>
                    <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Destination Wallet</th>
                    <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Wallet address</th>
                    <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Date</th>
                    <th class="py-2 px-4 font-bold text-gray-600 dark:text-gray-400">Status</th>
                </tr>
            </thead>
            <tbody>
                @if (count($withdrawals) > 0)
                    @foreach ($withdrawals as $withdrawal)
                        <tr
                            class="border-0 border-b border-gray-300 dark:border-gray-700 hover:bg-gray-100 dark:hover:bg-gray-900">
                            <td class="py-2 px-4 text-gray-800 dark:text-gray-200">${{$withdrawal->amount}}</td>
                            <td class="py-2 px-4 text-gray-800 dark:text-gray-200">{{ $withdrawal->userWallet->name ?? 'Nil' }}</td>
                            <td class="py-2 px-4 text-gray-800 dark:text-gray-200">${{ $withdrawal->userWallet->address ?? '---' }}</td>
                            <td class="py-2 px-4 text-gray-800 dark:text-gray-200">{{ date('M d, Y', strtotime($withdrawal->created_at)) }}</td>
                            @if ($withdrawal->is_approved)
                                <td class="py-2 px-4 text-green-600 dark:text-green-500 font-semibold text-xs">
                                    Approved
                                </td>
                            @else
                                <td class="py-2 px-4 text-yellow-600 dark:text-yellow-500 font-semibold text-xs">
                                    Pending
                                </td>
                            @endif                            
                        </tr>
                    @endforeach
                @endif
            </tbody>
        </table>
    </div>
    {{-- paginator --}}
    <div class="w-full p-4">
        {{$withdrawals->links()}}
    </div>
</div>
