<x-app-layout>
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="text-center">
                <h5 class="section-title ff-secondary text-center text-primary fw-normal">abonnement</h5>
                <h1 class="mb-5">our plans for you !!!</h1>
            </div>
            <div class="owl-carousel testimonial-carousel">
                @foreach($abonnement as $abo)
                <div class="testimonial-item bg-transparent border rounded p-4">
                    <h2 class="text-center text-xl font-bold my-4">{{ $abo->type }}</h2>
                    <div class="d-flex align-items-center">
                        <div class="ps-3">
                            <p>{{ __('Number of Articles: :nbr', ['nbr' => $abo->nbr_article]) }}</p>
                            <h5 class="mb-1">{{ __('Type of Media: :media', ['media' => $abo->type_media]) }}</h5>
                            <small>{{ __('Number of Scans: :scans', ['scans' => $abo->nbr_scan]) }}</small>
                        </div>
                    </div>
                    <div class="d-flex justify-content-center">
                    <div class="mt-3">
                    @if($user->abonnement_id == null)
    <form action="{{ route('plan.shows_plan', $abo) }}" method="POST">
        @csrf
        <button class="btn btn-success  rounded">Shows Plan</button>
    </form>
@endif

@if($user->abonnement_id != $abo->id)
    <form action="{{ route('plan.shows_plan', $abo) }}" method="POST">
        @csrf
        <button class="btn bg-yellow-300 py-2 rounded-full mt-2 me-2">{{ $abo->price }}{{ ($abo->price=='FREE') ? '' : ' DH' }}</button>
    </form>
@endif

@if($user->abonnement_id == $abo->id)
    <h1>You have this plan</h1>
@endif
</div></div>
                </div>
                @endforeach
              
                
            </div>
        </div>
    </div>
    
</x-app-layout>
