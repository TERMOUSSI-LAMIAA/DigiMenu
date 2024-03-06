    <x-app-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
                {{ __('Add article') }}
            </h2>
        </x-slot>

        <x-slot name="slot">
            <form method="POST" action="{{ route('Articles.store') }}" enctype="multipart/form-data">
                @csrf
        
                <!-- title -->
                <div>
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" required autofocus />
                </div>

                <!-- description -->
                <div class="mt-4">
                    <x-input-label for="description" :value="__('Description')" />
                    <textarea id="description" name="description" class="form-input rounded-md shadow-sm mt-1 block w-full" required></textarea>
                </div>

                <!-- price -->
                <div class="mt-4">
                    <x-input-label for="price" :value="__('Price')" />
                    <x-text-input id="price" class="block mt-1 w-full" type="number" name="price" required />
                </div>
                <!-- menu -->
                <div class="mt-4">
                    <x-input-label for="menu" :value="__('Menu')" />
                    <select id="menu" name="menu" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        @foreach ($menus as $m)
                            <option value="{{ $m->id }}">{{ $m->title }}</option>
                        @endforeach
                    </select>
                </div>

<div class="mt-4">
    <x-input-label for="media" :value="__('image/video')" />
    <input id="media" name="media" type="file" class="form-input rounded-md shadow-sm mt-1 block w-full" accept={{($user->abonnement->type_media == 'video ') ? 'image/*,video/*' : 'image/*'}} required />
</div>
                <!-- category -->
                <div class="mt-4">
                    <x-input-label for="category" :value="__('Category')" />
                    <select id="category" name="category" class="form-input rounded-md shadow-sm mt-1 block w-full" required>
                        @foreach ($catgs as $c)
                            <option value="{{ $c->id }}">{{ $c->title }}</option>
                        @endforeach
                    </select>
                </div>


                <!-- Submit button for the form -->
                <div class="mt-4">
                   {{-- {{ $ar }} --}}
                   @if ($user->abonnement->nbr_article>count($ar ))
                   <x-primary-button type="submit">Add</x-primary-button>
                    @else
                     you added the max articles fore this abonnement
                     <a href="{{ route('plan.plan_owner') }}" class="btn bg-blue-400">upgrade abonnement</a>
                   @endif
                </div>
            </form>
        </x-slot>
    </x-app-layout>
