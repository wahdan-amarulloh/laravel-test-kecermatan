<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto select-none p-2">
        <x-card title="Test">
            <div x-data="local">
                {{-- timer --}}
                <div class="flex flex-col">
                    <div class="flex w-full items-center justify-center text-center text-6xl">
                        {{-- <div
                            class="mx-1 w-24 rounded-lg bg-slate-200 p-2 text-indigo-400 dark:bg-gray-700 dark:text-indigo-400">
                            <div class="font-mono leading-none" x-text="time().days">00</div>
                            <div class="font-mono text-sm uppercase leading-none">Days</div>
                        </div>
                        <div
                            class="mx-1 w-24 rounded-lg bg-slate-200 p-2 text-indigo-400 dark:bg-gray-700 dark:text-indigo-400">
                            <div class="font-mono leading-none" x-text="time().hours">00</div>
                            <div class="font-mono text-sm uppercase leading-none">Hours</div>
                        </div> --}}
                        <div
                            class="mx-1 w-24 rounded-lg bg-slate-200 p-2 text-indigo-400 dark:bg-gray-700 dark:text-indigo-400">
                            <div class="font-mono leading-none" x-text="time().minutes">00</div>
                            <div class="font-mono text-sm uppercase leading-none">Minutes</div>
                        </div>
                        <div
                            class="mx-1 w-24 rounded-lg bg-slate-200 p-2 text-indigo-400 dark:bg-gray-700 dark:text-indigo-400">
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
                        <div
                            class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6 dark:bg-gray-600 dark:text-slate-800">
                            <span x-text="questions['A']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                A
                            </span>
                            <div class="absolute top-0 right-0 mt-0 mr-0 w-full">
                                <div class="flex content-end justify-end">
                                    <button type="button"
                                        class="inline-block rounded-bl-full border border-gray-500 bg-gray-600 py-2 px-4 text-center leading-5 text-gray-100 hover:border-slate-600 hover:bg-slate-700 hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:outline-none focus:ring-0 dark:bg-gray-800">
                                        A
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6 dark:bg-gray-600 dark:text-slate-800">
                            <span x-text="questions['B']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                B
                            </span>
                            <div class="absolute top-0 right-0 mt-0 mr-0 w-full">
                                <div class="flex content-end justify-end">
                                    <button type="button"
                                        class="inline-block rounded-bl-full border border-gray-500 bg-gray-600 py-2 px-4 text-center leading-5 text-gray-100 hover:border-slate-600 hover:bg-slate-700 hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:outline-none focus:ring-0 dark:bg-gray-800">
                                        B
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6 dark:bg-gray-600 dark:text-slate-800">
                            <span x-text="questions['C']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                C
                            </span>
                            <div class="absolute top-0 right-0 mt-0 mr-0 w-full">
                                <div class="flex content-end justify-end">
                                    <button type="button"
                                        class="inline-block rounded-bl-full border border-gray-500 bg-gray-600 py-2 px-4 text-center leading-5 text-gray-100 hover:border-slate-600 hover:bg-slate-700 hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:outline-none focus:ring-0 dark:bg-gray-800">
                                        C
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6 dark:bg-gray-600 dark:text-slate-800">
                            <span x-text="questions['D']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                D
                            </span>
                            <div class="absolute top-0 right-0 mt-0 mr-0 w-full">
                                <div class="flex content-end justify-end">
                                    <button type="button"
                                        class="inline-block rounded-bl-full border border-gray-500 bg-gray-600 py-2 px-4 text-center leading-5 text-gray-100 hover:border-slate-600 hover:bg-slate-700 hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:outline-none focus:ring-0 dark:bg-gray-800">
                                        D
                                    </button>
                                </div>
                            </div>
                        </div>
                        <div
                            class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6 dark:bg-gray-600 dark:text-slate-800">
                            <span x-text="questions['E']"
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                E
                            </span>
                            <div class="absolute top-0 right-0 mt-0 mr-0 w-full">
                                <div class="flex content-end justify-end">
                                    <button type="button"
                                        class="inline-block rounded-bl-full border border-gray-500 bg-gray-600 py-2 px-4 text-center leading-5 text-gray-100 hover:border-slate-600 hover:bg-slate-700 hover:text-white hover:ring-0 focus:border-black focus:bg-black focus:outline-none focus:ring-0 dark:bg-gray-800">
                                        E
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- answer --}}
                    <div :class="{ 'animate-pulse ': loading }">
                        <div
                            class="shadow-s mx-auto mt-3 flex w-full max-w-2xl content-center justify-center space-x-2 space-x-10 rounded-md bg-indigo-600 text-lg text-white">
                            <span x-show="loading"
                                class="py-6 text-3xl font-extrabold tracking-tight dark:text-slate-50 sm:text-4xl">
                                L O A D I N G . .
                            </span>
                            <span x-show="!loading" x-text="questions?.detail[currentStep]['A']"
                                class="py-6 text-3xl font-extrabold tracking-tight dark:text-slate-50 sm:text-4xl">
                                A
                            </span>
                            <span x-show="!loading" x-text="questions?.detail[currentStep]['B']"
                                class="py-6 text-3xl font-extrabold tracking-tight dark:text-slate-50 sm:text-4xl">
                                A
                            </span>
                            <span x-show="!loading" x-text="questions?.detail[currentStep]['C']"
                                class="py-6 text-3xl font-extrabold tracking-tight dark:text-slate-50 sm:text-4xl">
                                A
                            </span>
                            <span x-show="!loading" x-text="questions?.detail[currentStep]['D']"
                                class="py-6 text-3xl font-extrabold tracking-tight dark:text-slate-50 sm:text-4xl">
                                A
                            </span>
                            <span x-show="!loading" x-text="questions?.detail[currentStep]['E']"
                                class="py-6 text-3xl font-extrabold tracking-tight dark:text-slate-50 sm:text-4xl">
                                A
                            </span>
                        </div>
                    </div>
                    <div class="mt-3 flex w-full justify-center space-x-2 text-lg" x-show="!loading">
                        <div @click="answer('A')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300 dark:bg-gray-600 dark:hover:bg-slate-400">
                            <span
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                A
                            </span>
                        </div>
                        <div @click="answer('B')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300 dark:bg-gray-600 dark:hover:bg-slate-400">
                            <span
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                B
                            </span>
                        </div>
                        <div @click="answer('C')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300 dark:bg-gray-600 dark:hover:bg-slate-400">
                            <span
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                C
                            </span>
                        </div>
                        <div @click="answer('D')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300 dark:bg-gray-600 dark:hover:bg-slate-400">
                            <span
                                class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                                D
                            </span>
                        </div>
                        <div @click="answer('E')"
                            class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300 dark:bg-gray-600 dark:hover:bg-slate-400">
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

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('local', () => ({
                    storeAnswer: {},
                    timeTest: 60,
                    timePause: null,
                    test_id: null,
                    pausedTime: 0,
                    pauseInterval: 5,
                    loading: false,
                    running: false,
                    batch: 0,
                    maxBatch: 10,
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
                        navigator.vibrate(100);
                        if (this.percentage < 90) {
                            this.questions_detail.push({
                                id: this.questions.detail[this.currentStep].id,
                                answer: answer,
                                batch: this.batch
                            });
                            this.currentStep++;
                        } else {
                            // this.sendAnswer();
                            this.currentStep = 0;
                            this.getQuestions();
                        }
                    },
                    get percentage() {
                        return (this.currentStep / this.questionsTotal) * 100;
                    },
                    async getQuestions() {
                        if (this.maxBatch === this.batch) {
                            this.sendAnswer();
                            this.running = false;
                            clearInterval(this.interval);
                            Swal.fire({
                                title: 'Success',
                                text: 'Sesi test sudah berakhir ',
                                icon: 'warning',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                window.location =
                                    `{{ route('dashboard') }}?question=${this.test_id}`
                            });
                        }

                        if (this.batch != 0) {
                            this.pause();
                        }

                        axios.get('{{ route('questions.take') }}', {})
                            .then((response) => {
                                this.questions = response.data;
                                this.questionsTotal = response.data.detail.length;
                                this.storeAnswer.question_id = this.questions.id;
                                this.batch++;
                                console.log('getQuestions', this.storeAnswer);
                            });
                    },
                    getDetail() {
                        this.questions.detail[currentStep];

                    },
                    async sendAnswer() {
                        let param = {
                            user_id: sharedData.user.id,
                            question_id: this.storeAnswer.question_id,
                            detail_id: this.questions_detail
                        }
                        let url = '{{ route('test.store') }}';
                        let responses = axios.post(url, param)
                            .then((response) => {
                                this.takeResponse(response);
                                this.questions_detail = [];
                                this.batch = 0;
                            });
                    },
                    takeResponse(response) {
                        if (response.data.error == 'Error') {
                            Swal.fire({
                                title: 'Error!',
                                text: 'An error occurred: ' + response.data.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }

                        this.test_id = response.data.test_id
                    },
                    expiry: new Date().setDate(new Date().getDate() + 1),
                    remaining: null,
                    interval: null,
                    date(offset = 0) {
                        return new Date(new Date().setSeconds(new Date().getSeconds() + offset))
                    },
                    start() {
                        this.currentStep = 0;
                        this.questions_detail = [];
                        this.expiry = this.date(this.timeTest)
                        this.running = true;
                        this.setRemaining()
                        this.interval = setInterval(() => {
                            this.setRemaining();
                        }, 1000);
                    },
                    resume() {
                        if (this.loading) {
                            this.expiry = this.date(this.timeTest);
                            this.loading = false;
                            this.setRemaining();
                            this.interval = setInterval(() => {
                                this.setRemaining();
                            }, 1000);
                        }
                    },
                    pause() {
                        this.loading = true;
                        this.pausedTime = this.remaining;
                        clearInterval(this.interval);
                        setTimeout(() =>
                            this.resume(), 5000)
                        // this.interval = setInterval(() => {
                        // }, 1000);
                        return 0;
                    },
                    setRemaining() {
                        const diff = this.expiry - new Date().getTime();
                        this.remaining = parseInt(diff / 1000);
                        if (this.remaining <= 0) {
                            this.getQuestions();
                            // Swal.fire({
                            //     title: 'Success',
                            //     text: 'Sesi test sudah berakhir ',
                            //     icon: 'warning',
                            //     confirmButtonText: 'OK'
                            // });
                            // this.sendAnswer();
                            // this.running = false;
                            // clearInterval(this.interval);
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
                        this.$nextTick(() => {
                            this.getQuestions();
                        })
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
