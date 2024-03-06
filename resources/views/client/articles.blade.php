<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Menu List') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        <div class="container mx-auto">
            <div class="grid grid-cols-2 gap-4">
                @forelse ($articles as $article)
                    <div class="p-4 border border-gray-200">
                        <h3 class="text-lg font-semibold">{{ $article->title }}</h3>
                        <p>Restaurant: {{ $article->menu->name }}</p>
                       
                    </div>
                @empty
                <p>num:{{$num_scan}}</p>
                    <p class="text-center text-gray-500">No menus available.</p>
                @endforelse
            </div>
        </div>
    </x-slot>
</x-guest-layout>
