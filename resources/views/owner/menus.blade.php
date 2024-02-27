<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Gestion menus') }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        
        <div class="relative overflow-x-auto my-6">
            @role('owner')
                        <a href="{{ route('menus.create') }}" class="btn bg-blue-500 text-white rounded p-2 mx-6 my-6">add menu</a>

            @endrole
            @role('operator')
            <a href="{{ route('menu.create') }}" class="btn bg-blue-500 text-white rounded p-2 mx-6 my-6">add menu</a>

            @endrole
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                   
                   
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            title
                        </th>
                        <th scope="col" class="px-6 py-3">
                            qrcode
                        </th>
                       
                        
                       
                        <th scope="col" class="px-6 py-3 text-center">
                            actions
                          </th>
                    </tr>
                </thead>
            <tbody>
                    @forelse ($menus as $item)
                        
                   
                    <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{ $item->title }}
                        </th>
                        <td class="px-6 py-4">
                        {{ QrCode::size(100)->generate('http://localhost/Articles/'.$item->id) }}

                        {{-- @php
                        $qrCode = QrCode::size(100)->generate('test');
                        @endphp
                        <img src="data:image/png;base64,{{ base64_encode($qrCode) }}" alt="QR Code" class="w-20 h-20"> --}}
                       </td>
                       
                        <td class="px-6 py-4 flex justify-around">
                        
                            @can('delete')
                            <div class=""> <form action="" method="POST">
                                @csrf
                                @method('delete')
                                <button class="btn bg-red-500 text-white rounded p-1">delete</button>
                              </form></div>
                            @endcan
                        </td>
                    
                    @empty
                    <td colspan="12"><h1 class="text-center">no menus yet</h1></td> 
                </tr>
                    @endforelse
                </tbody> 
            </table>
        </div>
    </x-slot>
</x-app-layout>