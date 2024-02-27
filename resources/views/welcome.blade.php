<x-welcome-layout>
 <x-slot name="home">
    @foreach($restaurant as $resto )
    {{ $resto->user }}
    @endforeach
    
 </x-slot>
</x-welcome-layout>