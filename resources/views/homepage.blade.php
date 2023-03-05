<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">


    <!-- Scripts -->
    @env('local')
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endenv

    @env(['staging', 'production'])
    <link href="{{ asset('build/assets/app.css') }}" rel="stylesheet">
    <script src="{{ asset('build/assets/app.js') }}" defer></script>
    @endenv
</head>

<body class="bg-slate-800 bg-hero-pattern bg-cover p-6">
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
                class="absolute inset-x-0 z-20 mt-5 w-full rounded-sm bg-white/10 px-6 py-4 pt-2 transition-all duration-300 ease-in-out dark:bg-gray-800 md:relative md:top-0 md:mt-0 md:flex md:w-auto md:translate-x-0 md:items-center md:bg-transparent md:p-0 md:opacity-100">
                <div class="flex flex-col md:mx-6 md:flex-row">
                    <a class="my-2 transform text-white transition-colors duration-300 hover:text-amber-400 dark:text-gray-200 dark:hover:text-blue-400 md:mx-4 md:my-0"
                        href="/">Beranda</a>
                    <a class="my-2 transform text-white transition-colors duration-300 hover:text-amber-400 dark:text-gray-200 dark:hover:text-blue-400 md:mx-4 md:my-0"
                        href="{{ route('test') }}">Trial Test</a>
                    <a class="my-2 transform text-white transition-colors duration-300 hover:text-amber-400 dark:text-gray-200 dark:hover:text-blue-400 md:mx-4 md:my-0"
                        href="#">Pendaftaran</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto px-6 py-4 md:flex md:items-center md:justify-end">
        <div class="flex w-full max-w-md flex-col rounded-md bg-white/60 px-4 py-8 shadow-md sm:px-6 md:px-8 lg:px-10">
            <div class="self-center text-xl font-medium uppercase text-gray-800 sm:text-2xl">Login To Your Account</div>
            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <!-- Validation Errors -->
            <x-auth-validation-errors class="mb-4" :errors="$errors" />
            {{-- <div class="flex items-center justify-center">
                <a href="{{ route('auth.google') }}"
                    class="mt-3 inline-flex w-full items-center rounded-md border-2 border-gray-500 bg-white px-6 py-3 font-semibold text-gray-900 shadow outline-none hover:border-blue-400 hover:bg-blue-50 focus:outline-none"><svg
                        xmlns="http://www.w3.org/2000/svg" class="mr-3 inline h-4 w-4 fill-current text-gray-900"
                        viewBox="0 0 48 48" width="48px" height="48px">
                        <path fill="#fbc02d"
                            d="M43.611,20.083H42V20H24v8h11.303c-1.649,4.657-6.08,8-11.303,8c-6.627,0-12-5.373-12-12 s5.373-12,12-12c3.059,0,5.842,1.154,7.961,3.039l5.657-5.657C34.046,6.053,29.268,4,24,4C12.955,4,4,12.955,4,24s8.955,20,20,20 s20-8.955,20-20C44,22.659,43.862,21.35,43.611,20.083z">
                        </path>
                        <path fill="#e53935"
                            d="M6.306,14.691l6.571,4.819C14.655,15.108,18.961,12,24,12c3.059,0,5.842,1.154,7.961,3.039 l5.657-5.657C34.046,6.053,29.268,4,24,4C16.318,4,9.656,8.337,6.306,14.691z">
                        </path>
                        <path fill="#4caf50"
                            d="M24,44c5.166,0,9.86-1.977,13.409-5.192l-6.19-5.238C29.211,35.091,26.715,36,24,36 c-5.202,0-9.619-3.317-11.283-7.946l-6.522,5.025C9.505,39.556,16.227,44,24,44z">
                        </path>
                        <path fill="#1565c0"
                            d="M43.611,20.083L43.595,20L42,20H24v8h11.303c-0.792,2.237-2.231,4.166-4.087,5.571 c0.001-0.001,0.002-0.001,0.003-0.002l6.19,5.238C36.971,39.205,44,34,44,24C44,22.659,43.862,21.35,43.611,20.083z">
                        </path>
                    </svg>Sign in with Google
                </a>
            </div> --}}
            <div class="mt-6">
                <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div class="mb-6 flex flex-col">
                        <label for="email" class="mb-1 text-xs tracking-wide text-gray-600 sm:text-sm">E-Mail
                            Address:</label>
                        <div class="relative">
                            <div
                                class="absolute left-0 top-0 inline-flex h-full w-10 items-center justify-center text-gray-400">
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path
                                        d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" />
                                </svg>
                            </div>

                            <input id="email" type="email" name="email"
                                class="w-full rounded-lg border border-gray-400 py-2 pl-10 pr-4 text-sm placeholder-gray-500 focus:border-blue-400 focus:outline-none sm:text-base"
                                placeholder="E-Mail Address" />
                        </div>
                    </div>
                    <div class="mb-6 flex flex-col">
                        <label for="password"
                            class="mb-1 text-xs tracking-wide text-gray-600 sm:text-sm">Password:</label>
                        <div class="relative">
                            <div
                                class="absolute left-0 top-0 inline-flex h-full w-10 items-center justify-center text-gray-400">
                                <span>
                                    <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                        <path
                                            d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
                                    </svg>
                                </span>
                            </div>

                            <input id="password" type="password" name="password"
                                class="w-full rounded-lg border border-gray-400 py-2 pl-10 pr-4 text-sm placeholder-gray-500 focus:border-blue-400 focus:outline-none sm:text-base"
                                placeholder="Password" />
                        </div>
                    </div>

                    <div class="mb-6 -mt-4 flex items-center">
                        <div class="ml-auto flex">
                            @if (Route::has('password.request'))
                                <a href="{{ route('password.request') }}"
                                    class="inline-flex text-xs text-blue-500 hover:text-blue-700 sm:text-sm">
                                    Forgot Your Password?
                                </a>
                            @endif
                        </div>
                    </div>

                    <div class="flex w-full">
                        <button type="submit"
                            class="flex w-full items-center justify-center rounded bg-blue-600 py-2 text-sm text-white transition duration-150 ease-in hover:bg-blue-700 focus:outline-none sm:text-base">
                            <span class="mr-2 uppercase">Login</span>
                            <span>
                                <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                                    stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                                    <path d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                </svg>
                            </span>
                        </button>
                    </div>
                </form>
            </div>
            <div class="mt-6 flex items-center justify-center">
                <a href="#" target="_blank"
                    class="inline-flex items-center text-center text-xs font-bold text-blue-500 hover:text-blue-700">
                    <span>
                        <svg class="h-6 w-6" fill="none" stroke-linecap="round" stroke-linejoin="round"
                            stroke-width="2" viewBox="0 0 24 24" stroke="currentColor">
                            <path
                                d="M18 9v3m0 0v3m0-3h3m-3 0h-3m-2-5a4 4 0 11-8 0 4 4 0 018 0zM3 20a6 6 0 0112 0v1H3v-1z" />
                        </svg>
                    </span>
                    <a href="{{ route('register') }}" class="ml-2">You don't have an account ? </a>

                </a>
            </div>
        </div>
    </div>
</body>

</html>
