<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Inventory App</title>
        <link rel="icon" type="image/x-icon" href="/images/logo.png">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body
        class="overflow-y-auto [&::-webkit-scrollbar]:w-[.6rem] [&::-webkit-scrollbar-track]:rounded-full [&::-webkit-scrollbar-track]:bg-gray-200  [&::-webkit-scrollbar-thumb]:rounded-full [&::-webkit-scrollbar-thumb]:bg-gray-400 dark:[&::-webkit-scrollbar-track]:bg-neutral-700 dark:[&::-webkit-scrollbar-thumb]:bg-neutral-500">
        @yield('container')
        @yield('js')

    </body>

</html>
