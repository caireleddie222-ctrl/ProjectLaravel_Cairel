<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Loan Transaction') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto">
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                    <h4 class="text-xl font-semibold mb-6 text-gray-800 dark:text-gray-200">
                        Record New Payment
                    </h4>

                    <form action="{{ route('loantransactions.store') }}" method="POST" class="space-y-4">
                        @csrf

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Customer</label>
                            <select name="customer_id" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option value="">-- Select a Customer --</option>
                                @foreach($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Loan</label>
                            <select name="loan_id" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                                <option value="">-- Select a Loan --</option>
                                @foreach($loans as $loan)
                                    <option value="{{ $loan->id }}">{{ $loan->description }} (₱{{ number_format($loan->amount, 2) }})</option>
                                @endforeach
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Amount Paid</label>
                            <input type="number" step="0.01" name="amount_paid" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Date Paid</label>
                            <input type="date" name="date_paid" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        </div>

                        <div class="flex justify-between pt-4">
                            <a href="{{ route('loantransactions.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
                            <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Save Transaction</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
