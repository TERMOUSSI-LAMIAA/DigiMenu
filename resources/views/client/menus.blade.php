{{-- <x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Menu List') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        @if(session('error'))
    <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
        {{ session('error') }}
    </div>
@endif
        <div class="container mx-auto">
            <div class="grid grid-cols-2 gap-4">
                @forelse ($menus as $menu)
                    <div class="p-4 border border-gray-200">
                        <h3 class="text-lg font-semibold">{{ $menu->title }}</h3>
                        <p>Restaurant: {{ $menu->restaurant->name }}</p>
                         {{ QrCode::size(100)->generate(route('getArticles',$menu)) }}
                    </div>
                @empty
                    <p class="text-center text-gray-500">No menus available.</p>
                @endforelse
            </div>
        </div>
    </x-slot>
</x-guest-layout> --}}

<x-guest-layout>

<x-slot name="slot">
        {{-- @if(session('error'))
    <div class="bg-red-500 text-white p-4 mb-4 rounded-md">
        {{ session('error') }}
    </div>
@endif --}}
 <!-- Service Start -->
  <div class="bg-gray-100 py-8">
    <div class="container mx-auto">
        {{-- <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8"> --}}
            @forelse ($menus as $menu)
                <div class="bg-white p-6 border border-gray-300 rounded-md shadow-md hover:shadow-lg transform hover:-translate-y-1 transition duration-300 ease-in-out">
                    <h3 class="text-2xl font-semibold text-indigo-700 mb-2">{{ $menu->title }}</h3>
                    <p class="text-gray-600">Restaurant: {{ $menu->restaurant->name }}</p>
                    <div class="mt-6">
                        <div class="bg-gray-200 p-4 rounded-md">
                            {{ QrCode::size(150)->generate(route('getArticles', $menu)) }}
                        </div>
                    </div>
                </div>
            @empty
                <p class="text-center text-gray-500">No menus available.</p>
            @endforelse
        {{-- </div> --}}
    </div>
</div>


 
                 
            
    </x-slot>
</x-guest-layout>