<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Welcome ' . Auth::user()->name) }}
        </h2>
        <section id="why-us" class="why-us bg-blue-500 py-16">
            <div class="container mx-auto" data-aos="fade-up">
        
                <div class="flex flex-wrap gap-4">
        
                    <div class="lg:w-1/3" data-aos="fade-up" data-aos-delay="100">
                        <div class="bg-white p-8 rounded-lg shadow-md">
                            <h3 class="text-3xl font-bold mb-4">Why Choose Yummy?</h3>
                            <p class="text-gray-700">
                                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel necessitatibus optio ad corporis.
                            </p>
                            <div class="text-center mt-6">
                                <a href="#" class="bg-blue-700 text-white py-2 px-6 rounded-md inline-block">Learn More <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div><!-- End Why Box -->
        
                    <div class="lg:w-2/3 flex items-center">
                        <div class="flex flex-wrap gap-4">
        
                            <div class="xl:w-1/3" data-aos="fade-up" data-aos-delay="200">
                                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                                    <i class="bi bi-clipboard-data text-4xl mb-4"></i>
                                    <h4 class="text-lg font-bold mb-2">Corporis voluptates officia eiusmod</h4>
                                    <p class="text-gray-700">Consequuntur sunt aut quasi enim aliquam quae harum pariatur laboris nisi ut aliquip</p>
                                </div>
                            </div><!-- End Icon Box -->
        
                            <div class="xl:w-1/3" data-aos="fade-up" data-aos-delay="300">
                                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                                    <i class="bi bi-gem text-4xl mb-4"></i>
                                    <h4 class="text-lg font-bold mb-2">Ullamco laboris ladore pan</h4>
                                    <p class="text-gray-700">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt</p>
                                </div>
                            </div><!-- End Icon Box -->
        
                            <div class="xl:w-1/3" data-aos="fade-up" data-aos-delay="400">
                                <div class="bg-white p-8 rounded-lg shadow-md text-center">
                                    <i class="bi bi-inboxes text-4xl mb-4"></i>
                                    <h4 class="text-lg font-bold mb-2">Labore consequatur incidid dolore</h4>
                                    <p class="text-gray-700">Aut suscipit aut cum nemo deleniti aut omnis. Doloribus ut maiores omnis facere</p>
                                </div>
                            </div><!-- End Icon Box -->
        
                        </div>
                    </div>
        
                </div>
        
            </div>
        </section>
        
        
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
                                 @if($user->abonnement_id == null  )
                                 <form action="{{ route('plan.shows_plan',$abo) }}" method="POST">@csrf <button class="btn bg-green-500 text-white p-2 rounded ">shows plan</button></form>

                                 @endif
                                 @if($user->abonnement_id != $abo->id)
                                 <form action="{{ route('plan.shows_plan',$abo) }}" method="POST">@csrf
                                    {{-- <input type="text" name="abone" value="{{ $abo->id }} " hidden > --}}
                                    <button class="btn bg-green-500 text-white p-2 rounded "> {{ $abo->price }} {{($abo->price=='FREE')?'':'DH'  }} </button></form>

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
