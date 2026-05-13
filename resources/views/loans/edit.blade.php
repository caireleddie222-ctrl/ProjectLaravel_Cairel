<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Loan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                    <h4 class="text-xl font-semibold mb-6 text-gray-800 dark:text-gray-200">
                        Update Loan Information
                    </h4>

                    <form action="{{ route('loans.update', $loan->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Description</label>
                            <input type="text" name="description" value="{{ $loan->description }}" required
                                   class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount</label>
                            <input type="number" step="0.01" name="amount" value="{{ $loan->amount }}" required
                                   class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Term</label>
                            <input type="text" name="term" value="{{ $loan->term }}" required
                                   class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Interest Rate (%)</label>
                            <input type="number" step="0.01" name="interest" value="{{ $loan->interest }}" required
                                   class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date Granted</label>
                            <input type="date" name="dategranted" value="{{ $loan->dategranted }}" required
                                   class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>

                        <div class="flex justify-between pt-4">
                            <a href="{{ route('loans.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">Update Loan</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
