<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto p-2">
        <x-card title="Test">
            <div x-data="local">
                {{-- timer --}}
                <div x-data="timer()" class="flex flex-col">
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
                        <x-button
                            class="bg-indigo-500 hover:bg-indigo-400 focus:border-indigo-800 focus:bg-indigo-700 active:bg-indigo-700"
                            @click="start()">Start</x-button>
                    </div>
                </div>

                {{-- wrapper --}}
                <div x-transition.opacity.duration.500ms>
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
                    <div class="mt-3 flex w-full justify-center space-x-2 text-lg">
                        <div @click="answer('A')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                            <span x-text="questions?.detail[currentStep]['A']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                A
                            </span>
                            <div class="absolute inset-x-0 bottom-0 w-full">
                                <div class="flex content-center justify-center">
                                    <button type="button"
                                        class="inline-block rounded border border-gray-500 bg-gray-600 py-2 px-4 text-center leading-5 text-gray-100 hover:border-slate-600 hover:bg-slate-700 hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:outline-none focus:ring-0">
                                        A
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div @click="answer('B')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                            <span x-text="questions?.detail[currentStep]['B']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                B
                            </span>
                            <div class="absolute inset-x-0 bottom-0 w-full">
                                <div class="flex content-center justify-center">
                                    <button type="button"
                                        class="inline-block rounded border border-gray-500 bg-gray-600 py-2 px-4 text-center leading-5 text-gray-100 hover:border-slate-600 hover:bg-slate-700 hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:outline-none focus:ring-0">
                                        B
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div @click="answer('C')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                            <span x-text="questions?.detail[currentStep]['C']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                C
                            </span>
                            <div class="absolute inset-x-0 bottom-0 w-full">
                                <div class="flex content-center justify-center">
                                    <button type="button"
                                        class="inline-block rounded border border-gray-500 bg-gray-600 py-2 px-4 text-center leading-5 text-gray-100 hover:border-slate-600 hover:bg-slate-700 hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:outline-none focus:ring-0">
                                        C
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div @click="answer('D')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                            <span x-text="questions?.detail[currentStep]['D']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                D
                            </span>
                            <div class="absolute inset-x-0 bottom-0 w-full">
                                <div class="flex content-center justify-center">
                                    <button type="button"
                                        class="inline-block rounded border border-gray-500 bg-gray-600 py-2 px-4 text-center leading-5 text-gray-100 hover:border-slate-600 hover:bg-slate-700 hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:outline-none focus:ring-0">
                                        D
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div @click="answer('E')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                            <span x-text="questions?.detail[currentStep]['E']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                E
                            </span>
                            <div class="absolute inset-x-0 bottom-0 w-full">
                                <div class="flex content-center justify-center">
                                    <button type="button"
                                        class="inline-block rounded border border-gray-500 bg-gray-600 py-2 px-4 text-center leading-5 text-gray-100 hover:border-slate-600 hover:bg-slate-700 hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:outline-none focus:ring-0">
                                        E
                                    </button>
                                </div>
                            </div>
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

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('local', () => ({
                    open: false,
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
                    toggle() {
                        this.open = !this.open
                    },
                    answer(answer) {
                        if (this.percentage < 90) {
                            this.currentStep++;
                        } else {
                            this.currentStep = 0;
                            this.getQuestions();
                        }
                        console.log(this.currentStep + ' ' + this.questionsTotal + ' ' + this.percentage)
                    },
                    get percentage() {
                        return (this.currentStep / this.questionsTotal) * 100;
                    },
                    getQuestions() {
                        axios.get('http://127.0.0.1:8000/api/questions', {})
                            .then((response) => {
                                this.questions = response.data;
                                this.questionsTotal = response.data.detail.length;
                            });
                    },
                    getDetail() {
                        this.questions.detail[currentStep];

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
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('timer', () => ({
                    expiry: new Date().setDate(new Date().getDate() + 1),
                    remaining: null,
                    interval: null,
                    date(offset = 0) {
                        return new Date(new Date().setSeconds(new Date().getSeconds() + offset))
                    },
                    start() {
                        this.expiry = this.date(120)
                        this.setRemaining()
                        this.interval = setInterval(() => {
                            this.setRemaining();
                        }, 1000);
                    },
                    setRemaining() {
                        const diff = this.expiry - new Date().getTime();
                        this.remaining = parseInt(diff / 1000);
                        if (this.remaining <= 0) {
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
                }));
            })
        </script>
    @endpush
</x-app-layout>
