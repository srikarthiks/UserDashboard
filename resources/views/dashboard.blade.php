<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h3 >Welcome, {{ Auth::user()->name }}</h3>
                    <p class="mt-3">Your email: {{ Auth::user()->email }}</p>
                </div>

                <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold mb-3">Update Profile</h3>
                        <form method="POST" action="{{ route('dashboard.profile.update') }}">
                            @csrf
                            @method('PATCH')
                            <div class="mb-3">
                                <label for="father_name" class="block text-sm font-medium text-gray-700">Father's Name:</label>
                                {{-- <input type="text" name="father_name" id="father_name" class="mt-1 p-2 w-full border rounded-md" value="{{ auth()->user()->profile->father_name }}"> --}}
                                <input type="text" name="father_name" id="father_name" class="mt-1 p-2 w-full border rounded-md" value="{{ optional(auth()->user()->profile)->father_name }}">
                            </div>
                            <div class="mb-3">
                                <label for="mother_name" class="block text-sm font-medium text-gray-700">Mother's Name:</label>
                                <input type="text" name="mother_name" id="mother_name" class="mt-1 p-2 w-full border rounded-md" value="{{ optional(auth()->user()->profile)->mother_name }}">
                            </div>

                            <button type="submit" class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Update Profile</button>


                        </form>
                    </div>
                </div>
                <div class="mt-4 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <h3 class="text-lg font-semibold mb-3">Your Addresses</h3>

                        <ul class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @foreach(auth()->user()->addresses as $address)
                                <li class="bg-gray-100 shadow-sm rounded-md p-4">
                                    <p>{{ $address->address1 }},</p>
                                    @if ($address->address2)
                                        <p>{{ $address->address2 }},</p>
                                    @endif
                                    <p>{{ $address->pincode }}</p>
                                    <a href="{{ route('dashboard.address.edit', $address) }}" class="font-bold mt-3 py-6 px-1 rounded text-blue-700 mt-5">Edit</a>

                                </li>
                            @endforeach
                        </ul>

                        <a href="{{ route('dashboard.address.create') }}" class="font-bold py-2 px-4 rounded  text-blue-700">Add Address</a>
                    </div>
                </div>
            </div>
        </div>
            </div>
        </div>
    </div>

</x-app-layout>
