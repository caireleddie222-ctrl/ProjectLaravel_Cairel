<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Loans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                <div class="flex justify-between items-center mb-6">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        Loan List
                    </h3>

                    <a href="{{ route('loans.create') }}"
                       class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                        + Add Loan
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                            <tr>
                                <th class="px-4 py-2">#</th>
                                <th class="px-4 py-2">Description</th>
                                <th class="px-4 py-2">Amount</th>
                                <th class="px-4 py-2">Term</th>
                                <th class="px-4 py-2">Interest (%)</th>
                                <th class="px-4 py-2">Date Granted</th>
                                <th class="px-4 py-2 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($loans as $index => $loan)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-2">{{ $index + 1 }}</td>
                                    <td class="px-4 py-2">{{ $loan->description }}</td>
                                    <td class="px-4 py-2">₱{{ number_format($loan->amount, 2) }}</td>
                                    <td class="px-4 py-2">{{ $loan->term }}</td>
                                    <td class="px-4 py-2">{{ $loan->interest }}%</td>
                                    <td class="px-4 py-2">{{ $loan->dategranted }}</td>

                                    <td class="px-4 py-2 text-center space-x-2">
                                        <a href="{{ route('loans.edit', $loan->id) }}"
                                           class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">
                                            Edit
                                        </a>

                                        <form action="{{ route('loans.destroy', $loan->id) }}"
                                              method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                    onclick="return confirm('Delete this loan?')"
                                                    class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">
                                                Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-4 text-gray-500">
                                        No loans found.
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
