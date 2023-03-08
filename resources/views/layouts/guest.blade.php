<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" x-data="{ darkMode: localStorage.getItem('dark') === 'true' }" x-init="$watch('darkMode', val => localStorage.setItem('dark', val))"
    x-bind:class="{ 'dark': darkMode }">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <livewire:styles />

    <!-- Scripts -->
    @env('local')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endenv

    @env(['staging', 'production'])
    <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet">
    <script src="{{ asset('build/assets/app.js') }}" defer></script>
    @endenv

    <x-livewire-alert::scripts />
    <script>
        window.sharedData = {
            user: @js(auth()->user()),
        }
    </script>
</head>

<body class="font-sans text-base font-normal text-gray-600 dark:bg-gray-800 dark:text-gray-400">
    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>


    <livewire:scripts />
    @stack('scripts')
</body>

</html>
