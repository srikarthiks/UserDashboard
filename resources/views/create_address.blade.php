<!-- create_address.blade.php -->
<x-app-layout>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h3 class="text-lg font-semibold mb-3">Add New Address</h3>
                    <form method="POST" action="{{ route('dashboard.address.store') }}">
                        @csrf
                        <div class="mb-3">
                            <label for="address1" class="block text-sm font-medium text-gray-700">Address Line 1:</label>
                            <input type="text" name="address1" id="address1" class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-3">
                            <label for="address2" class="block text-sm font-medium text-gray-700">Address Line 2:</label>
                            <input type="text" name="address2" id="address2" class="mt-1 p-2 w-full border rounded-md">
                        </div>
                        <div class="mb-3">
                            <label for="pincode" class="block text-sm font-medium text-gray-700">Pincode:</label>
                            <input type="text" name="pincode" id="pincode" class="mt-1 p-2 w-full border rounded-md">
                        </div>

                        <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Add Address</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
