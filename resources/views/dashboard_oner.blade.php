<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('welcome '. Auth::user()->name ) }}
        </h2>
    </x-slot>
     @if(!empty($user))
{{ $user->restaurant }}

       @else
       <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You don't have a resturant !") }}
                </div>
                <a href="{{ route('resturant.create') }}" class="btn bg-yellow-500 text-white rounded p-2">add your resturant informations</a>
            </div>
        </div>
    </div> 
     @endif
    
</x-app-layout>
