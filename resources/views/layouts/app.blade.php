<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased relative min-h-screen overflow-x-hidden">
        <!-- Global Gradient Background & SVG Overlay -->
        <div class="fixed inset-0 -z-10 w-full h-full">
            <svg class="w-full h-full" viewBox="0 0 1440 900" fill="none" xmlns="http://www.w3.org/2000/svg">
                <defs>
                    <linearGradient id="bg-grad" x1="0" y1="0" x2="0" y2="1">
                        <stop offset="0%" stop-color="#b9e0ff"/>
                        <stop offset="60%" stop-color="#2563eb"/>
                        <stop offset="100%" stop-color="#000"/>
                    </linearGradient>
                </defs>
                <rect width="1440" height="900" fill="url(#bg-grad)"/>
                <path d="M100 0 Q200 100 100 200" stroke="#fff" stroke-opacity="0.15" stroke-width="4" fill="none"/>
                <path d="M0 100 Q100 200 0 300" stroke="#fff" stroke-opacity="0.10" stroke-width="3" fill="none"/>
                <path d="M0 400 Q200 500 0 600" stroke="#fff" stroke-opacity="0.08" stroke-width="2" fill="none"/>
            </svg>
        </div>
        <div class="min-h-screen">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>
        </div>
    </body>
</html>
