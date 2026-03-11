<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'LinkStack') }}</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sansation text-gray-900 antialiased m-0 p-0 bg-[#F2F2F2]">
        <div class="hidden lg:flex min-h-screen flex flex-col lg:flex-row">
            
            <div class="w-full lg:w-2/5 bg-[#6A6ECF] flex flex-col items-center justify-center p-8 text-center min-h-[30vh] lg:min-h-screen">
                <h1 class="text-white text-5xl lg:text-7xl xl:text-[100px] leading-tight">
                    LinkStack
                </h1>
                <div class="w-full flex justify-center mt-4">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo" class="h-32 lg:h-48 xl:h-[300px] object-contain">
                </div>
            </div>

            <div class="w-full lg:w-3/5 flex items-center justify-center p-6 md:p-12 lg:p-16 bg-[#F2F2F2]">
                <div class="w-full max-w-xl">
                    {{ $slot }}
                </div>
            </div>

        </div>
    </body>
</html>