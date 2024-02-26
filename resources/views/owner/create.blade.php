<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add your resturant') }}
        </h2>
    </x-slot>
    <div class="container mx-auto mt-8">
        <form action="{{ route('resturant.store') }}" method="POST">
            @csrf

            <div class="mb-4">
                <label for="name" class="block text-sm font-medium text-gray-600">Restaurant Name</label>
                <input type="text" name="name" id="name" class="mt-1 p-2 border rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <label for="address" class="block text-sm font-medium text-gray-600">Address</label>
                <input type="text" name="address" id="address" class="mt-1 p-2 border rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <label for="opening_hr" class="block text-sm font-medium text-gray-600">Opening Hours</label>
                <input type="time" name="opening_hr" id="opening_hr" class="mt-1 p-2 border rounded-md w-full" required>
            </div>

            <div class="mb-4">
                <button type="submit" class="bg-red-500 text-white py-2 px-4 rounded-md">Add Restaurant</button>
            </div>
        </form>
    </div>
</x-app-layout>



