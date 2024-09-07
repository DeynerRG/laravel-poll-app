<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Poll App' }}</title>
        @livewireStyles
        @vite('resources/css/app.css')
    </head>
    <body class="font-raleway"> 
        <main class="w-full lg:mx-auto lg:w-6/12 mt-10">
            {{-- <nav class="flex">
                <x-nav-link href="{{ route('home') }}">Home</x-nav-link>
                <x-divider/>
                <x-nav-link href="{{ route('about') }}">About</x-nav-link>
            </nav> --}}
            {{ $slot }}
        </main>
        @livewireScripts
    </body>
</html>
