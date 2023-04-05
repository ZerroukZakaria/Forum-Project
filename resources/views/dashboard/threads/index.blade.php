<x-app>

    {{-- Header --}}
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight">
            {{ __('Threads') }}
        </h2>
    </x-slot>

    <section class="px-6">
        <div class="overflow-hidden border-b border-gray-200">
            <table class="min-w-full">
                <thead class="bg-blue-500">
                    <tr>
                        <x-table.head>Id</x-table.head>
                        <x-table.head>Author</x-table.head>
                        <x-table.head>Title</x-table.head>
                        <x-table.head>Body</x-table.head>
                        <x-table.head class="text-center">Created At</x-table.head>
                        <x-table.head class="text-center">Updated At</x-table.head>
                        <x-table.head class="text-center">Actions</x-table.head>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 divide-solid">
                    @foreach($threads as $thread)
                    <tr>
                        <x-table.data>
                            <div>{{$thread->id()}}</div>
                        </x-table.data>
                        <x-table.data>
                            
                            <div>
                                <a class="ml-2 font-bold text-blue-500" href="{{route('profile', $thread->author())}}">
                                    {{$thread->author()->name()}}
                                </a>
                            </div>
                        </x-table.data>
                        <x-table.data>
                            <div>
                                <a class="ml-2 font-bold text-blue-500" href="{{ route('threads.show', [$thread->category->slug(), $thread->slug()]) }}">
                                    {{$thread->title()}}
                                </a>
                            </div></div>
                        </x-table.data>
                        <x-table.data>
                            <div>
                                {{$thread->excerpt()}}
                            </div>
                        </x-table.data>
                        <x-table.data>
                            <div class="text-center">{{$thread->createdAt()}}</div>
                        </x-table.data>
                        <x-table.data>
                            <div class="text-center">{{$thread->updatedAt()}}</div>
                        </x-table.data>
                        <x-table.data>
                            <x-form action="{{route('threads.delete', $thread->slug())}}" method="DELETE">
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