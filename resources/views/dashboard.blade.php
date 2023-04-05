<?php

$user = Auth::user();
?>

<x-app>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>


    <div class="content container-fluid">
        <div class="row justify-content-sm-center text-center py-56">
            <div class="col-sm-7 col-md-5">
                <h1 class="mb-4 text-4xl font-extrabold leading-none tracking-tight text-gray-900 md:text-5xl lg:text-6xl dark:text-white">Hello, nice to see you! {{$user->name()}}</h1>
                <p class="mb-6 text-lg font-normal text-gray-500 lg:text-xl sm:px-16 xl:px-48 dark:text-gray-400">You are now minutes away from creativity than ever before. Enjoy!</p>
                <a class="inline-flex items-center justify-center px-5 py-3 text-base font-medium text-center text-white bg-blue-700 rounded-lg hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 dark:focus:ring-blue-900" href="{{route('threads.create')}}">Create my first thread</a>
            </div>
        </div>
    </div>




</x-app>