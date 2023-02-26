<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="ltr">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flipclock@0.10.8/dist/flipclock.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/flipclock@0.10.8/dist/flipclock.js"></script>
</head>

<body class="bg-slate-800 bg-hero-pattern bg-scroll p-6">
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
                        href="#">Trial Test</a>
                    <a class="my-2 transform text-white transition-colors duration-300 hover:text-amber-400 dark:text-gray-200 dark:hover:text-blue-400 md:mx-4 md:my-0"
                        href="#">Pendaftaran</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container mx-auto flex content-center justify-center">
        <section class="relative pt-8">
            <div class="container block">
                <div class="flex flex-row justify-center">
                    <div class="col-md-6 text-center" id="notice">
                        <h3 class="mt-3 text-4xl text-white">Selamat Datang di Trial Tes Kecermatan</h3>
                        <h5 class="mt-2 text-2xl text-white">Peserta bisa mencoba simulasi Tes Kecermatan pada halaman
                            ini.
                        </h5>
                        <button
                            class="start mt-5 rounded bg-green-500 py-2 px-4 font-semibold text-white hover:bg-green-600 active:bg-green-700">
                            Mulai Test
                        </button>


                        {{-- <button type="button" class="btn btn-success font-weight-bold mt-3" id="show-main-test">

                        </button> --}}
                    </div>
                </div>
            </div>
        </section>

        <div class="mx-auto hidden p-6" id="test">
            <div class="clock text-3xl font-bold" id="timer"></div>
            {{-- <div class="message"></div> --}}

            {{-- <div class="mt-4 flex space-x-4">
                <button
                    class="start rounded bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700">Start</button>
                <button class="stop rounded bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700">Pause</button>
            </div> --}}
        </div>



    </div>


    <script>
        var el = document.querySelector('.clock');
        let isRunning = false;

        function date(offset = 0) {
            return new Date(new Date().setSeconds(new Date().getSeconds() + offset));
        }

        var clock = new FlipClock(el, () => date(2), {
            face: 'MinuteCounter',
            autoStart: false,
            countdown: true,
            stopAt: -2
        });

        clock.on('start', () => {
            isRunning = true;
            // document.querySelector('.message').innerHTML = 'Clock started!';
            document.querySelector('#notice').classList.toggle("block");
            document.querySelector('#test').classList.toggle("hidden");
        });

        clock.on('stop', () => {
            isRunning = false;
            // document.querySelector('.message').innerHTML = 'Clock stopped!';
            clock.reset();
            document.querySelector('#notice').classList.toggle("block");
            document.querySelector('#test').classList.toggle("hidden");

        });

        document.querySelector('.start').addEventListener('click', event => {
            clock.value = date(60);
            clock.timer.isStopped && clock.start();
        });

        // document.querySelector('.stop').addEventListener('click', event => {
        //     clock.timer.isRunning && clock.stop();
        // });
    </script>

</body>

</html>
