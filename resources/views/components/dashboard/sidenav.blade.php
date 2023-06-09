<aside class="min-h-screen col-span-1 px-8 bg-white shadow">
    <div class="py-6 space-y-7">
        {{-- Dashboard --}}
        <div>
            <x-sidenav.title>
                {{ __('Dashboard') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('profile.show') }}" :active="request()->routeIs('profile.show')">
                    <x-zondicon-user class="w-3 text-green-400" />
                    <span>{{ __('Profile') }}</span>
                </x-sidenav.link>
            </div>
            <div>
                {{-- Users --}}
                @if(auth()->user()->isAdmin())
                <x-sidenav.link href="{{ route('admin.users.index') }}" :active="request()->routeIs('admin.users.index')">
                    <x-zondicon-user-group class="w-3 text-green-400" />
                    <span>{{ __('Users') }}</span>
                </x-sidenav.link>
                @endif

                {{-- Notifications --}}

                <x-sidenav.link href="{{ route('dashboard.notifications.index') }}"
                    :active="request()->routeIs('dashboard.notifications.index')">
                    <x-zondicon-notifications-outline class="w-3 text-green-400" />
                    <span>{{ __('Notifications') }}</span>
                </x-sidenav.link>
            </div>
        </div>

        {{-- Categories --}}
        @if(auth()->user()->isAdmin())
        <div>
            <x-sidenav.title>
                {{ __('Categories') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('admin.categories.index') }}"
                    :active="request()->routeIs('admin.categories.index')">
                    <x-zondicon-view-tile class="w-3 text-green-400" />
                    <span>{{ __('Index') }}</span>
                </x-sidenav.link>
            </div>
            <div>
                <x-sidenav.link href="{{ route('admin.categories.create') }}"
                    :active="request()->routeIs('admin.categories.create')">
                    <x-zondicon-compose class="w-3 text-green-400" />
                    <span>{{ __('Create') }}</span>
                </x-sidenav.link>
            </div>
        </div>
        @endif

        {{-- Tags --}}
        @if(auth()->user()->isAdmin())
        <div>
            <x-sidenav.title>
                {{ __('Tags') }}
            </x-sidenav.title>
            <div>
                <x-sidenav.link href="{{ route('admin.tags.index') }}" :active="request()->routeIs('admin.tags.index')">
                    <x-zondicon-view-tile class="w-3 text-green-400" />
                    <span>{{ __('Index') }}</span>
                </x-sidenav.link>
            </div>
            <div>
                <x-sidenav.link href="{{ route('admin.tags.create') }}"
                    :active="request()->routeIs('admin.tags.create')">
                    <x-zondicon-compose class="w-3 text-green-400" />
                    <span>{{ __('Create') }}</span>
                </x-sidenav.link>
            </div>
        </div>
        @endif

        {{-- Threads --}}
        <div>
            <x-sidenav.title>
                {{ __('Threads') }}
            </x-sidenav.title>
            @if(auth()->user()->isAdmin())
            <div>
                <x-sidenav.link href="{{ route('admin.threads.index') }}"
                    :active="request()->routeIs('admin.threads.index')">
                    <x-zondicon-view-tile class="w-3 text-green-400" />
                    <span>{{ __('Index') }}</span>
                </x-sidenav.link>
            </div>

            @endif
            <div>
                <x-sidenav.link href="{{ route('dashboard.threads.index') }}"
                    :active="request()->routeIs('dashboard.threads.index')">
                    <x-zondicon-view-carousel class="w-3 text-green-400" />
                    <span>{{ __('My threads') }}</span>
                </x-sidenav.link>
            </div>

        </div>




        {{-- Authentication --}}
        <div>
            <x-sidenav.title>
                {{ __('Authentication') }}
            </x-sidenav.title>
            <div>
                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-sidenav.link href="{{ route('logout') }}"
                        onclick="event.preventDefault();                                               this.closest('form').submit();">
                        <x-heroicon-o-logout class="w-4 text-green-400" />
                        <span>{{ __('Logout') }}</span>
                    </x-sidenav.link>

                </form>

            </div>
        </div>

    </div>
</aside>