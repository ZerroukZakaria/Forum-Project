    
<x-guest>

    <style>
        html {
            scroll-behavior: smooth;
        }
    </style>
    <main class="grid grid-cols-4 gap-8 mt-8 wrapper">

        <x-partials.sidenav :thread="$thread" />

        <section class="flex flex-col col-span-3 gap-y-4">
            <x-alerts.main />
            <small class="text-sm text-gray-400">Threads>{{$category->name()}}>{{$thread->title()}}</small>

            <article class="p-5 bg-white shadow">
                <div class="grid grid-cols-8">

                    {{-- Avatar --}}
                    <div class="col-span-1">
                        <x-user.avatar :user="$thread->author()" />
                    </div>

                    {{-- Thread --}}
                    <div class="col-span-7 space-y-6">
                        <div class="space-y-3">
                            <h2 class="text-xl tracking-wide hover:text-blue-400">{{$thread->title()}}</h2>
                            <div class="text-gray-500">
                                {!!$thread->body()!!}
                            </div>
                        </div>


                        <div class="flex justify-between">

                            <div class="flex space-x-5 text-gray-500">
                                {{-- Likes --}}
                                <livewire:like-thread :thread="$thread" />

                                {{-- Views Count --}}
                                <div class="flex items-center space-x-2">
                                    <x-heroicon-o-eye class="w-4 h4 text-blue-300" />
                                    <span class="text-xs font-bold text-gray-500">{{views($thread)->count()}}</span>
                                </div>
                            </div>

                            {{-- Date Posted --}}
                            <div class="flex items-center text-xs text-gray-500">
                                <x-heroicon-o-clock class="w-4 h-4 mr-1" />
                                Posted: {{$thread->created_at->diffForHumans()}}
                            </div>

                            {{-- Reply --}}
                            <a href="#replyInput" class="flex items-center space-x-2 text-gray-500">
                                <x-heroicon-o-reply class="w-5 h-5" />
                                <span class="text-sm">Reply</span>
                            </a>


                        </div>
                    </div>
                </div>
            </article>

            {{-- Replies --}}
            <div class="mt-6 space-y-5">
                <h2 class="uppercase text-sm mb-0 font-bold">
                    Replies </h2>

                <hr>
                @foreach ($thread->replies() as $reply)

                <livewire:reply.update :reply="$reply" :key="$reply->id()" />
                @endforeach
            </div>


            @auth

            <div class="p-5 space-y-4 bg-white shadow">
                <h2 class="text-gray-500">Post a reply</h2>
                <x-form action="{{route('replies.store')}}">
                    <div>
                        <input id="replyInput" type="text" name="body"
                            class="w-full bg-gray-100 border-none shadow-inner focus:ring-blue-400" />
                        <x-form.error class="error" for="body" />

                        <input type="hidden" name="replyable_id" value="{{$thread->id()}}">

                        <input type="hidden" name="replyable_type" value="threads">
                    </div>

                    <div class="grid mt-4">
                        {{-- Button --}}
                        <x-buttons.primary class="justify-self-end">
                            {{ __('Reply') }}
                        </x-buttons.primary>
                    </div>

                </x-form>
            </div>
            @else
            <div class="p-4 text-gray-500 rounded bg-blue-200 flex justify-between">
                <h2>Login to leave a comment</h2>
                <a href="{{route('login')}}">Login</a>
            </div>


            @endauth

        </section>
    </main>
</x-guest>