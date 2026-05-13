<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loan Transactions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        Transaction Records
                    </h3>

                    <form method="GET" action="{{ route('loantransactions.index') }}" class="flex items-center w-full md:w-1/2 md:px-4">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search Customer Name..."
                               class="w-full rounded-l-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-r-md hover:bg-gray-700">Search</button>
                        @if(request('search'))
                            <a href="{{ route('loantransactions.index') }}" class="ml-2 text-sm text-red-500 hover:underline">Clear</a>
                        @endif
                    </form>

                    <div class="flex space-x-2">
                        <a href="{{ route('loantransactions.pdf') }}"
                           class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Export PDF</a>
                        <a href="{{ route('loantransactions.create') }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">+ Add Transaction</a>
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Customer Name</th>
                                <th class="px-4 py-2">Loan Description</th>
                                <th class="px-4 py-2">Amount Paid</th>
                                <th class="px-4 py-2">Date Paid</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($transactions as $index => $t)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2 font-semibold text-blue-500">{{ $t->customer->name }}</td>
                                    <td class="px-4 py-2">{{ $t->loan->description }}</td>
                                    <td class="px-4 py-2 text-green-500">₱{{ number_format($t->amount_paid, 2) }}</td>
                                    <td class="px-4 py-2">{{ $t->date_paid }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">
                                        No transactions found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
