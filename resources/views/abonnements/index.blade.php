<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('welcome '. Auth::user()->name ) }}
        </h2>
    </x-slot>

    <x-slot name="slot">
        
        <div class="relative overflow-x-auto my-6">
            <a href="{{ route('abonnements.create') }}" class="btn bg-blue-500 text-white rounded p-2 mx-6 my-6">add plan</a>
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                   
                   
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            type
                        </th>
                        <th scope="col" class="px-6 py-3">
                            start_date
                        </th>
                        <th scope="col" class="px-6 py-3">
                            nbr_article
                        </th>
                       
                        <th scope="col" class="px-6 py-3 text-center">
                            type_media
                          </th>
                           
                        <th scope="col" class="px-6 py-3 text-center">
                            nbr_scan
                          </th>
                          <th scope="col" class="px-6 py-3 text-center">
                            actions
                          </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($abonnement as $item)
                        
                   
                     <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                           {{ $item->type }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $item->start_date }}
                        </td>
                        <td class="px-6 py-4 ">
                            {{ $item->nbr_article}}
                        </td>
                          <td class="px-6 py-4 text-center">
                            {{ $item->type_media}}
                        </td>
                          <td class="px-6 py-4 text-center">
                            {{ $item->nbr_scan}}
                        </td>
                       
                        <td class="px-6 py-4 flex justify-around">
                        
                         <div class=""> <form action="" method="POST">
                            @csrf
                            @method('delete')
                            <button class="btn bg-red-500 text-white rounded p-1">delet</button>
                          </form></div>

                          <div class=""> <form action="{{ route('abonnements.edit',$item) }}" method="get">
                       
                           
                            <button class="btn bg-blue-500 text-white rounded p-1">edit</button>
                          </form></div>
                        </td>
                    
                    @empty
                    <td colspan="12"><h1 class="text-center">no operators</h1></td> 
                </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>
