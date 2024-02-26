<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Add menu') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        
        <form method="POST" action="{{ route('menus.store') }}">
            @csrf
    
            <!-- title -->
            <div>
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus  />            </div>
    

             <!-- Submit button for the form -->
            <div class="mt-4">
                <x-primary-button type="submit">Add</x-primary-button>
            </div>
        </form>
           
    
            
    </x-slot>
</x-app-layout>