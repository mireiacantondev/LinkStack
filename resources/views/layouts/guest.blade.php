<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'LinkStack') }}</title>

        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sansation text-gray-900 antialiased m-0 p-0">
        <div class="min-h-screen flex flex-row">
            <div class="w-2/5 bg-[#6A6ECF] flex flex-col items-center justify-center p-12 text-center">
                <div class>
                    <h1 class="font-sansation text-white text-[100px]">
                        LinkStack
                    </h1>
                    <div class="w-full flex justify-center">
                        <img src="{{ asset('images/logo.png') }}" alt="LinkStack Logo" class="h-[300px] object-contain">
                    </div>
                </div>
            </div>

            <div class="w-3/5 bg-[#F2F2F2] flex flex-col items-center justify-center p-16">
                {{ $slot }}
            </div>
        </div>
    </body>
</html>