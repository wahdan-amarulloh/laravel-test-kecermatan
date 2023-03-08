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


    <div class="mx-auto p-2">
        <x-card class="bg-slate-600/70">
            <div x-data="local">
                {{-- timer --}}
                <div class="flex flex-col">
                    <div class="flex w-full items-center justify-center text-center text-6xl">
                        <div class="mx-1 w-24 rounded-lg bg-slate-200 p-2 text-indigo-400">
                            <div class="font-mono leading-none" x-text="time().days">00</div>
                            <div class="font-mono text-sm uppercase leading-none">Days</div>
                        </div>
                        <div class="mx-1 w-24 rounded-lg bg-slate-200 p-2 text-indigo-400">
                            <div class="font-mono leading-none" x-text="time().hours">00</div>
                            <div class="font-mono text-sm uppercase leading-none">Hours</div>
                        </div>
                        <div class="mx-1 w-24 rounded-lg bg-slate-200 p-2 text-indigo-400">
                            <div class="font-mono leading-none" x-text="time().minutes">00</div>
                            <div class="font-mono text-sm uppercase leading-none">Minutes</div>
                        </div>
                        <div class="mx-1 w-24 rounded-lg bg-slate-200 p-2 text-indigo-400">
                            <div class="font-mono leading-none" x-text="time().seconds">00</div>
                            <div class="font-mono text-sm uppercase leading-none">Seconds</div>
                        </div>
                    </div>
                    <div class="mt-3 flex w-full justify-evenly">
                        <x-button x-show="!running"
                            class="bg-indigo-500 hover:bg-indigo-400 focus:border-indigo-800 focus:bg-indigo-700 active:bg-indigo-700"
                            @click="start()">Start</x-button>
                    </div>
                </div>

                {{-- wrapper --}}
                <div x-show="running" x-transition.opacity.duration.500ms>
                    {{-- question --}}
                    <div class="mt-3 flex w-full justify-center space-x-2 text-lg">
                        <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                            <span x-text="questions['A']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                A
                            </span>
                        </div>
                        <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                            <span x-text="questions['B']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                B
                            </span>
                        </div>
                        <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                            <span x-text="questions['C']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                C
                            </span>
                        </div>
                        <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                            <span x-text="questions['D']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                D
                            </span>
                        </div>
                        <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                            <span x-text="questions['E']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                E
                            </span>
                        </div>
                    </div>

                    {{-- answer --}}
                    <div
                        class="shadow-s mx-auto mt-3 flex w-full max-w-2xl content-center justify-center space-x-2 space-x-10 rounded-md bg-slate-300 text-lg">
                        <span x-text="questions?.detail[currentStep]['A']"
                            class="py-6 text-3xl font-extrabold tracking-tight text-amber-500 dark:text-slate-50 sm:text-4xl">
                            A
                        </span>
                        <span x-text="questions?.detail[currentStep]['B']"
                            class="py-6 text-3xl font-extrabold tracking-tight text-amber-500 dark:text-slate-50 sm:text-4xl">
                            A
                        </span>
                        <span x-text="questions?.detail[currentStep]['C']"
                            class="py-6 text-3xl font-extrabold tracking-tight text-amber-500 dark:text-slate-50 sm:text-4xl">
                            A
                        </span>
                        <span x-text="questions?.detail[currentStep]['D']"
                            class="py-6 text-3xl font-extrabold tracking-tight text-amber-500 dark:text-slate-50 sm:text-4xl">
                            A
                        </span>
                        <span x-text="questions?.detail[currentStep]['E']"
                            class="py-6 text-3xl font-extrabold tracking-tight text-amber-500 dark:text-slate-50 sm:text-4xl">
                            A
                        </span>
                    </div>
                    <div class="mt-3 flex w-full justify-center space-x-2 text-lg">
                        <div @click="answer('A')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                            <span
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                A
                            </span>
                        </div>
                        <div @click="answer('B')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                            <span
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                B
                            </span>
                        </div>
                        <div @click="answer('C')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                            <span
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                C
                            </span>
                        </div>
                        <div @click="answer('D')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                            <span
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                D
                            </span>
                        </div>
                        <div @click="answer('E')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                            <span
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                E
                            </span>
                        </div>
                    </div>

                    {{-- indicator --}}
                    <div class="mt-6 h-1.5 w-full rounded-full bg-gray-200 dark:bg-gray-700">
                        <div class="h-1.5 rounded-full bg-blue-400 transition dark:bg-blue-500"
                            :style="'width:' + percentage + '%'"></div>
                    </div>
                </div>
                {{-- end wrapper --}}
            </div>
        </x-card>

    </div>
    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('local', () => ({
                storeAnswer: {},
                timeTest: 120,
                running: false,
                errorMessage: null,
                questions_detail: [],
                questions: {
                    A: 'A',
                    B: 'B',
                    C: 'C',
                    D: 'D',
                    E: 'E',
                    detail: {
                        0: {
                            A: 'A',
                            B: 'B',
                            C: 'C',
                            D: 'D',
                            E: 'E',
                        }
                    }
                },
                questionsTotal: 0,
                currentStep: 0,
                answer(answer) {
                    if (this.percentage < 90) {
                        this.questions_detail.push({
                            id: this.questions.detail[this.currentStep].id,
                            answer: answer
                        });
                        this.currentStep++;
                    } else {
                        this.sendAnswer();
                        this.currentStep = 0;
                        this.getQuestions();
                    }
                },
                get percentage() {
                    return (this.currentStep / this.questionsTotal) * 100;
                },
                getQuestions() {
                    axios.get('{{ route('questions.take') }}', {})
                        .then((response) => {
                            this.questions = response.data;
                            this.questionsTotal = response.data.detail.length;
                            this.storeAnswer.question_id = this.questions.id;
                            console.log('getQuestions', this.storeAnswer);
                        });
                },
                getDetail() {
                    this.questions.detail[currentStep];

                },
                async sendAnswer() {
                    null;
                },
                takeResponse(response) {
                    console.log('response', response.data.error == 'Error')
                    if (response.data.error == 'Error') {
                        Swal.fire({
                            title: 'Error!',
                            text: 'An error occurred: ' + response.data.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                },
                expiry: new Date().setDate(new Date().getDate() + 1),
                remaining: null,
                interval: null,
                date(offset = 0) {
                    return new Date(new Date().setSeconds(new Date().getSeconds() + offset))
                },
                start() {
                    this.expiry = this.date(this.timeTest)
                    this.running = true;
                    this.setRemaining()
                    this.interval = setInterval(() => {
                        this.setRemaining();
                    }, 1000);
                },
                setRemaining() {
                    const diff = this.expiry - new Date().getTime();
                    this.remaining = parseInt(diff / 1000);
                    if (this.remaining <= 0) {
                        this.sendAnswer();
                        this.running = false;
                        clearInterval(this.interval);
                    }
                },
                days() {
                    return {
                        value: this.remaining / 86400,
                        remaining: this.remaining % 86400
                    };
                },
                hours() {
                    return {
                        value: this.days().remaining / 3600,
                        remaining: this.days().remaining % 3600
                    };
                },
                minutes() {
                    return {
                        value: this.hours().remaining / 60,
                        remaining: this.hours().remaining % 60
                    };
                },
                seconds() {
                    return {
                        value: this.minutes().remaining,
                    };
                },
                format(value) {
                    return ("0" + parseInt(value)).slice(-2)
                },
                time() {
                    return {
                        days: this.format(this.days().value),
                        hours: this.format(this.hours().value),
                        minutes: this.format(this.minutes().value),
                        seconds: this.format(this.seconds().value),
                    }
                },
                init() {
                    console.log('init')

                    this.$nextTick(() => {
                        this.getQuestions();
                    })
                }
            }))
        })
    </script>
</body>

</html>
