<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Customer') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            <div class="max-w-2xl mx-auto">
                <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">

                    <h4 class="text-xl font-semibold mb-6 text-gray-800 dark:text-gray-200">
                        Update Customer Info
                    </h4>

                    <form action="{{ route('customers.update', $customer->id) }}" method="POST" class="space-y-4">
                        @csrf
                        @method('PUT')

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Full Name
                            </label>
                            <input type="text" name="name" value="{{ $customer->name }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Address
                            </label>
                            <textarea name="address"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">{{ $customer->address }}</textarea>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Gender
                            </label>
                            <select name="gender"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                                <option {{ $customer->gender == 'Male' ? 'selected' : '' }}>Male</option>
                                <option {{ $customer->gender == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Date of Birth
                            </label>
                            <input type="date" name="dob" value="{{ $customer->dob }}"
                                class="mt-1 w-full rounded-md border-gray-300 shadow-sm focus:ring focus:ring-blue-200">
                        </div>

                        <div class="flex justify-between pt-4">
                            <a href="{{ route('customers.index') }}"
                               class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                                Cancel
                            </a>

                            <button type="submit"
                                    class="px-4 py-2 bg-blue-600 text-white rounded-md hover:bg-blue-700">
                                Update Customer
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</x-app-layout>
