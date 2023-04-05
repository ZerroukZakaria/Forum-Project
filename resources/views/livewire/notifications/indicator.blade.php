<div class="relative w-8">

    <a href="{{route('dashboard.notifications.index')}}" class="relative flex items-center justify-center w-6 h-8">
        @if($hasNotifications)
        <span class="absolute inline-flex w-full h-full bg-blue-400 rounded-full opacity-75 animate-ping">
        </span>
        <span class="relative inline-flex w-4 h-4 text-blue-400 rounded-full">
            <x-zondicon-notifications-outline />
        </span>

        <span class="absolute top-0 right-0 px-1 text-xs text-white bg-blue-500 rounded-full">
            <livewire:notifications.count>
        </span>

        @else
        <span class="relative inline-flex w-4 h-4 text-blue-400 rounded-full">
            <x-zondicon-notifications-outline />
        </span>
         <span class="absolute top-0 right-0 px-1 text-xs text-white bg-gray-500 rounded-full">
            <livewire:notifications.count>
        </span>
        @endif
    </a>
</div>