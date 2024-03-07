
<x-welcome-layout>

<x-slot name="home">
 <!-- Service Start -->
        <div class="container-xxl py-5">
            <div class="container">
                <div class="row g-4">
                    <div class="col-lg-3 col-sm-6 wow fadeInUp" data-wow-delay="0.1s">
                        <div class="service-item rounded pt-3">
                             @foreach ($restaurants as $restaurant)
                            <div class="p-4">
                                <h3 class="card-title text-lg font-weight-bold">{{ $restaurant->name }}</h3>
                              
                                <a href="{{ route('restMenus', ['restaurant' => $restaurant->id]) }}" class="btn btn-primary btn-block">View Menus</a>
                               
                            </div>
                              @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
                  
                 
            
    </x-slot>
</x-welcome-layout>