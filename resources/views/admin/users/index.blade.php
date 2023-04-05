<x-app>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-blue-500">
                    <tr>
                        <x-table.head>Id</x-table.head>
                        <x-table.head>Name</x-table.head>
                        <x-table.head class="text-center">Role</x-table.head>
                        <x-table.head class="text-center">Joined Date</x-table.head>
                        <x-table.head class="text-center">Actions</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach ($users as $user)
                    <tr>
                        <x-table.data>
                            <div>{{$user->id()}}</div>
                        </x-table.data>
                        <x-table.data>
                            <div>
                                <a class="ml-2 font-bold text-blue-500" href="{{route('profile', $user)}}">
                                    {{$user->name()}}
                                </a>
                            </div>
                        </x-table.data>
                        <x-table.data>
                            @if($user->role()==='Admin')
                            <div class="px-2 py-1 text-center text-gray-700 bg-red-300 rounded">
                                {{$user->role()}}
                            </div>
                            @else
                            <div class="px-2 py-1 text-center text-gray-700 bg-green-200 rounded">
                                {{$user->role()}}
                            </div>
                            @endif

                        </x-table.data>
                        <x-table.data>
                            <div class="text-center">{{$user->createdAt()}}</div>
                        </x-table.data>
                        <x-table.data>
                            <x-form action="{{route('admin.users.delete', $user)}}" method="DELETE">
                                <button type="submit" class="text-red-400">
                                    <x-zondicon-trash class="w-5 h-5" />

                                </button>
                            </x-form>
                        </x-table.data>
                    </tr>
                    @endforeach

                </tbody>

            </table>
        </div>
    </section>


</x-app>