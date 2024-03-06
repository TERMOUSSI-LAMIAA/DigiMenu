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
                        <a href="{{ route('restMenus', ['restaurant' => $restaurant->id]) }}" class="bg-blue-500 text-white px-4 py-2 rounded-full mt-2 inline-block">View Menus</a>
                    </div>
                @endforeach
            </div>
        </div>
    </x-slot>
</x-guest-layout>
