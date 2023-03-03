<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto p-2">
        <x-card title="Test">
            <div class="container mx-auto flex content-center justify-center" x-data="countdown()">
                <section class="relative pt-8" x-show="!isRunning"
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
                                <button x-ref="button" @click="toggle()"
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
                        <button x-ref="button" @click="reset()"
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

            <div class="mt-3 flex w-full justify-center space-x-2 text-lg">
                <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                    <span
                        class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                        A
                    </span>
                </div>
                <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                    <span
                        class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                        A
                    </span>
                </div>
                <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                    <span
                        class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                        A
                    </span>
                </div>
                <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                    <span
                        class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                        A
                    </span>
                </div>
                <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                    <span
                        class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                        A
                    </span>
                </div>
            </div>

            <div class="mt-3 flex w-full justify-center space-x-2 text-lg">
                <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                    <span
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
                <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                    <span
                        class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                        A
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
                <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                    <span
                        class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                        A
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
                <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                    <span
                        class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                        A
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
                <div class="relative flex h-32 w-32 content-center justify-center rounded-md bg-gray-200 p-6">
                    <span
                        class="mt-4 text-3xl font-extrabold tracking-tight text-slate-900 dark:text-slate-50 sm:text-4xl">
                        A
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

        </x-card>
    </div>
</x-app-layout>
