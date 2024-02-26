<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Add article') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <form method="POST" action="{{ route('Articles.store') }}" enctype="multipart/form-data">
            @csrf
    
            <!-- title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
            </div>

            <!-- description -->
            <div class="mt-4">
                <x-input-label for="description" :value="__('Description')" />
                <textarea id="description" name="description" class="form-input rounded-md shadow-sm mt-1 block w-full" required></textarea>
            </div>

            <!-- price -->
            <div class="mt-4">
                <x-input-label for="price" :value="__('Price')" />
                <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" required />
            </div>

            <!-- menu -->
            <div class="mt-4">
                <x-input-label for="menu" :value="__('Menu')" />
                <x-select id="menu" name="menu" :options="$menuOptions" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
            </div>

            <!-- category -->
            <div class="mt-4">
                <x-input-label for="category" :value="__('Category')" />
                <x-select id="category" name="category" :options="$categoryOptions" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
            </div>

            <!-- image -->
            <div class="mt-4">
                <x-input-label for="image" :value="__('Image')" />
                <input id="image" name="image" type="file" class="form-input rounded-md shadow-sm mt-1 block w-full" required />
            </div>
    
            <!-- Submit button for the form -->
            <div class="mt-4">
                <x-primary-button type="submit">Add</x-primary-button>
            </div>
        </form>
    </x-slot>
</x-app-layout>
