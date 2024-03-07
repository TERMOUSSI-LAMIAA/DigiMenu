<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-center text-xl text-gray-800 leading-tight">
            {{ __('Gestion operators') }}
        </h2>
    </x-slot> --}}

    <x-slot name="slot">
        <div class="relative overflow-x-auto my-6">
            @role('Admin')
                <a href="{{ route('operators.Addoperator') }}" class="btn bg-blue-500 text-white rounded p-2 mx-6 my-6">add operator</a>
            @endrole
            @role('owner')
                <a href="{{ route('Addoperator_own') }}" class="btn bg-blue-500 text-white rounded p-2 mx-6 my-6">add operator</a>
            @endrole
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            user name
                        </th>
                        <th scope="col" class="px-6 py-3">
                            email
                        </th>
                        <th scope="col" class="px-6 py-3">
                            email verified
                        </th>
                        <th scope="col" class="px-6 py-3 text-center">
                            actions
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($operators as $item)
                        <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                            <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->name }}
                            </th>
                            <td class="px-6 py-4">
                                {{ $item->email }}
                            </td>
                            <td class="px-6 py-4">
                                {{ ($item->email_verified_at) ? 'yes' : 'no' }}
                            </td>
                            <td class="px-6 py-4 flex justify-around">
                                <div>
                                    <form action="{{-- your_delete_route_here --}}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button class="btn bg-red-500 text-white rounded p-1">delete</button>
                                    </form>
                                </div>
                                @role('Admin')
                                    <div>
                                        <form action="{{ route('Users.asignowner', $item) }}" method="POST">
                                            @csrf
                                            <button class="btn bg-blue-400 text-white rounded p-1">assign owner</button>
                                        </form>
                                    </div>
                                @endrole
                                @role('owner')
                                    @if($item->hasPermissionTo('add'))
                                        <h1>can add</h1>
                                    @else
                                        <div>
                                            <form action="{{ route('operator.permition', $item) }}" method="POST">
                                                @csrf
                                                <button class="btn bg-red-500 text-white rounded p-1">can add</button>
                                            </form>
                                        </div>
                                    @endif
                                    @if($item->hasPermissionTo('delete'))
                                        <h1>can delete</h1>
                                    @else
                                        <div>
                                            <form action="{{ route('operator.permition_delete', $item) }}" method="POST">
                                                @csrf
                                                <button class="btn bg-red-300 text-white rounded p-1">can delete</button>
                                            </form>
                                        </div>
                                    @endif
                                @endrole
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4"><h1 class="text-center">no operators</h1></td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </x-slot>
</x-app-layout>
