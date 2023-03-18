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

<body class="bg-slate-800 bg-hero-pattern bg-cover p-6" style="background-image: url('{{ asset('images/bg.jpg') }}')">
    <nav x-data="{ isOpen: false }" class="relative">
        <div class="container mx-auto px-6 py-4 md:flex md:items-center md:justify-between">
            <div class="flex items-center justify-between">
                <a href="#">
                    <img class="h-16 w-auto" src="{{ asset('images/logo.png') }}" alt="">
                </a>

                <!-- Mobile menu button -->
                <div class="flex md:hidden">
                    <button x-cloak @click="isOpen = !isOpen" type="button"
                        class="text-gray-500 hover:text-gray-600 focus:text-gray-600 focus:outline-none dark:text-gray-200 dark:hover:text-gray-400 dark:focus:text-gray-400"
                        aria-label="toggle menu">
                        <svg x-show="!isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 8h16M4 16h16" />
                        </svg>

                        <svg x-show="isOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                            viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>


            <!-- Mobile Menu open: "block", Menu closed: "hidden" -->
            <div x-cloak :class="[isOpen ? 'translate-x-0 opacity-100 ' : 'opacity-0 -translate-x-full']"
                class="absolute inset-x-0 z-20 mt-5 w-full rounded-md bg-gray-600/90 px-6 py-4 pt-2 transition-all duration-300 ease-in-out dark:bg-gray-800 md:relative md:top-0 md:mt-0 md:flex md:w-auto md:translate-x-0 md:items-center md:bg-transparent md:p-0 md:opacity-100">
                <div class="flex flex-col md:mx-6 md:flex-row">
                    <a class="my-2 transform text-white transition-colors duration-300 hover:text-amber-400 dark:text-gray-200 dark:hover:text-blue-400 md:mx-4 md:my-0"
                        href="/">Beranda</a>
                    <a class="my-2 transform text-white transition-colors duration-300 hover:text-amber-400 dark:text-gray-200 dark:hover:text-blue-400 md:mx-4 md:my-0"
                        href="{{ route('test.trial') }}">Trial Test</a>
                    <a class="my-2 transform text-white transition-colors duration-300 hover:text-amber-400 dark:text-gray-200 dark:hover:text-blue-400 md:mx-4 md:my-0"
                        href="{{ route('register') }}">Pendaftaran</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="font-sans text-gray-900 antialiased">
        {{ $slot }}
    </div>


    <livewire:scripts />
    @stack('scripts')
</body>

</html>
