<div>
    <div class="container mx-auto flex content-center justify-center" x-data="countdown()">
        <section class="relative pt-8" x-show="!$wire.started"
            x-transition:enter="transition-transform transition-opacity ease-out duration-300"
            x-transition:enter-start="opacity-0 transform translate-x-2"
            x-transition:enter-end="opacity-100 transform translate-y-0"
            x-transition:leave="transition ease-in duration-300"
            x-transition:leave-end="opacity-0 transform -translate-x-2">
            <div class="container block">
                <div class="flex flex-row justify-center">
                    <div class="col-md-6 text-center">
                        <h3 class="mt-3 text-4xl">Selamat Datang di Trial Tes Kecermatan</h3>
                        <h5 class="mt-2 text-2xl">Peserta bisa mencoba simulasi Tes Kecermatan pada
                            halaman
                            ini.
                        </h5>
                        <button x-ref="button" @click="$wire.toggle()"
                            class="start mt-5 rounded bg-blue-500 py-2 px-4 font-semibold text-white hover:bg-blue-600 active:bg-blue-700">
                            Mulai Test
                        </button>


                        {{-- <button type="button" class="btn btn-success font-weight-bold mt-3" id="show-main-test">

                        </button> --}}
                    </div>
                </div>
            </div>
        </section>

        <div class="mx-auto p-6" style="display: none" x-show="isRunning" x-transition>
            <div class="clock text-3xl font-bold" x-ref="wrapper">
            </div>
            <dev class="flex flex-row justify-center">
                <button x-ref="button" @click="$wire.stop()"
                    class="start mt-5 rounded bg-blue-600 py-2 px-4 font-semibold text-white hover:bg-blue-500 active:bg-blue-800">
                    Reset
                </button>
            </dev>
            {{-- <div class="message"></div> --}}

            {{-- <div class="mt-4 flex space-x-4">
                <button
                    class="start rounded bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700">Start</button>
                <button class="stop rounded bg-blue-500 py-2 px-4 font-bold text-white hover:bg-blue-700">Pause</button>
            </div> --}}
        </div>
    </div>

    {{-- wrapper --}}
    <div x-show="$wire.started" x-transition.opacity.duration.500ms>
        {{-- question --}}
        <div class="mt-3 flex w-full justify-center space-x-2 text-lg">
            <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                <span class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                    {{ $questions->A }}
                </span>
            </div>
            <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                <span class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                    {{ $questions->B }}
                </span>
            </div>
            <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                <span class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                    {{ $questions->C }}
                </span>
            </div>
            <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                <span class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                    {{ $questions->D }}
                </span>
            </div>
            <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                <span class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                    {{ $questions->E }}
                </span>
            </div>
        </div>

        {{-- answer --}}
        <div class="mt-3 flex w-full justify-center space-x-2 text-lg">
            <div wire:click="answer('A')"
                class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                <span class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                    {{ $answer->A }}
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
            <div wire:click="answer('B')"
                class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                <span class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                    {{ $answer->B }}
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
            <div wire:click="answer('C')"
                class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                <span class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                    {{ $answer->C }}
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
            <div wire:click="answer('D')"
                class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                <span class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                    {{ $answer->D }}
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
            <div wire:click="answer('E')"
                class="relative flex h-32 w-32 cursor-pointer content-center justify-center rounded-md bg-gray-200 p-6 hover:bg-slate-300">
                <span class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                    {{ $answer->E }}
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
                style="width: {{ $percentage }}%"></div>
        </div>
    </div>
    {{-- end wrapper --}}
</div>
