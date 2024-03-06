<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Gestion menus') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="container mx-auto">
            <div class="grid grid-cols-3 gap-4">
                @foreach ($restaurants as $restaurant)
                    <div class="p-4 border border-gray-200">
                        <h3 class="text-lg font-semibold">{{ $restaurant->name }}</h3>
                      
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-guest-layout>
