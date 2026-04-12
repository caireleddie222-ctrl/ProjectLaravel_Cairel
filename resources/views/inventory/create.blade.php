<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Add Inventory Item') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="max-w-2xl mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                <form action="{{ route('inventory.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Item Name</label>
                        <input type="text" name="name" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">SKU (Stock Keeping Unit)</label>
                        <input type="text" name="sku" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Quantity</label>
                        <input type="number" name="quantity" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">Price</label>
                        <input type="number" step="0.01" name="price" required class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                    </div>
                    <div class="flex justify-between pt-4">
                        <a href="{{ route('inventory.index') }}" class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">Cancel</a>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded-md hover:bg-green-700">Save Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
