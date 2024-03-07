{{-- <x-guest-layout>
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
</x-guest-layout> --}}
<x-app-layout>

<x-slot name="slot">
 <!-- Service Start -->
       
@forelse ($articles as $article)
    <div class="p-6 border rounded-md bg-white shadow-md hover:shadow-lg transform hover:-translate-y-1 transition duration-300 ease-in-out mb-4">
        <h3 class="text-xl font-semibold text-indigo-700">{{ $article->title }}</h3>
        <p class="text-gray-600">Menu: {{ $article->menu->title }}</p>
        <p class="text-gray-600">Restaurant: {{ $article->menu->restaurant->name }}</p>
    </div>
@empty
    <div class="col-span-3 text-center">
        <p class="text-gray-500">No articles available.</p>
        {{-- <p class="text-gray-500">Number of Scans: {{ $num_scan }}</p> --}}
    </div>
@endforelse





                  
                 
            
    </x-slot>
</x-app-layout>