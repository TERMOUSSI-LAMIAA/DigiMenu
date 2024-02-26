<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome ' . Auth::user()->name) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __("You're logged in!") }}

                    <div class="mt-4 grid grid-cols-3 gap-4">
                        @foreach($abonnement as $abo)
                            <div class="bg-white p-4 border rounded shadow">
                                <h3 class="text-lg font-semibold mb-2">{{ $abo->type }}</h3>
                                <p class="text-sm text-gray-600">{{ __('Start Date: :date', ['date' => $abo->start_date]) }}</p>
                                <p class="text-sm text-gray-600">{{ __('Number of Articles: :nbr', ['nbr' => $abo->nbr_article]) }}</p>
                                <p class="text-sm text-gray-600">{{ __('Type of Media: :media', ['media' => $abo->type_media]) }}</p>
                                <p class="text-sm text-gray-600">{{ __('Number of Scans: :scans', ['scans' => $abo->nbr_scan]) }}</p>
                                <!-- Add other fields as needed -->
                                 @if($user->abonnement_id == null)
                                 <form action="{{ route('plan.shows_plan',$abo) }}" method="POST">@csrf <button class="btn bg-green-500 text-white p-2 rounded ">shows plan</button></form>

                                 @endif
                                 @if($user->abonnement_id == $abo->id)
                                       <h1>you have this plan</h1>
                                 @endif
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
