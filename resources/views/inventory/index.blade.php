<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Inventory Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                <div class="flex flex-col md:flex-row justify-between items-center mb-6 space-y-4 md:space-y-0">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200">
                        Inventory Items
                    </h3>

                    <form action="{{ route('inventory.index') }}" method="GET" class="flex items-center w-full md:w-1/2 md:px-4">
                        <input type="text" name="search" value="{{ request('search') }}" placeholder="Search name or SKU..."
                               class="w-full rounded-l-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200 dark:bg-gray-700 dark:text-white dark:border-gray-600">
                        <button type="submit" class="px-4 py-2 bg-gray-600 text-white rounded-r-md hover:bg-gray-700">Search</button>
                        @if(request('search'))
                            <a href="{{ route('inventory.index') }}" class="ml-2 text-sm text-red-500 hover:underline">Clear</a>
                        @endif
                    </form>

                    <div class="flex space-x-2">
                        <a href="{{ route('inventory.pdf', ['search' => request('search')]) }}"
                           class="px-4 py-2 bg-red-600 text-white rounded-md hover:bg-red-700">Export PDF</a>
                        <a href="{{ route('inventory.create') }}"
                           class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">+ Add Item</a>
                    </div>
                </div>

                <div class="overflow-x-auto mb-4">
                    <table class="w-full text-sm text-left text-gray-600 dark:text-gray-300">
                        <thead class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-200">
                            <tr>
                                <th class="px-4 py-2">SKU</th>
                                <th class="px-4 py-2">Item Name</th>
                                <th class="px-4 py-2">Quantity</th>
                                <th class="px-4 py-2">Price</th>
                                <th class="px-4 py-2 text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($inventories as $item)
                                <tr class="border-b dark:border-gray-700">
                                    <td class="px-4 py-2 font-mono text-xs">{{ $item->sku }}</td>
                                    <td class="px-4 py-2">{{ $item->name }}</td>
                                    <td class="px-4 py-2">{{ $item->quantity }}</td>
                                    <td class="px-4 py-2">₱{{ number_format($item->price, 2) }}</td>
                                    <td class="px-4 py-2 text-center space-x-2">
                                        <a href="{{ route('inventory.edit', $item->id) }}" class="px-3 py-1 bg-yellow-500 text-white rounded hover:bg-yellow-600 text-sm">Edit</a>
                                        <form action="{{ route('inventory.destroy', $item->id) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" onclick="return confirm('Delete this item?')" class="px-3 py-1 bg-red-600 text-white rounded hover:bg-red-700 text-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center py-4 text-gray-500">No inventory items found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <div class="mt-4">
                    {{ $inventories->appends(['search' => $search])->links() }}
                </div>

            </div>
        </div>
    </div>
</x-app-layout>
