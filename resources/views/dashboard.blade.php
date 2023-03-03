<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto p-2">
        {{-- Put content here --}}
        <div class="mx-auto mt-3 w-full">
            <div>
                <div class="flex flex-wrap">
                    <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                        <div class="relative mb-6 flex min-w-0 flex-col break-words rounded bg-white shadow-lg xl:mb-0">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full max-w-full flex-1 flex-grow pr-4">
                                        <h5 class="text-blueGray-400 text-xs font-bold uppercase">
                                            Traffic
                                        </h5>
                                        <span class="text-xl font-semibold text-gray-700">
                                            350,897
                                        </span>
                                    </div>
                                    <div class="relative w-auto flex-initial pl-4">
                                        <div
                                            class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-red-500 p-3 text-center text-white shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                            </svg>

                                        </div>
                                    </div>
                                </div>
                                <p class="text-blueGray-400 mt-4 text-sm">
                                    <span class="mr-2 text-emerald-500">
                                        <i class="fas fa-arrow-up"></i> 3.48%
                                    </span>
                                    <span class="whitespace-nowrap">
                                        Since last month
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                        <div class="relative mb-6 flex min-w-0 flex-col break-words rounded bg-white shadow-lg xl:mb-0">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full max-w-full flex-1 flex-grow pr-4">
                                        <h5 class="text-blueGray-400 text-xs font-bold uppercase">
                                            New users
                                        </h5>
                                        <span class="text-blueGray-700 text-xl font-semibold">
                                            {{ $users }}
                                        </span>
                                    </div>
                                    <div class="relative w-auto flex-initial pl-4">
                                        <div
                                            class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-orange-500 p-3 text-center text-white shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                            </svg>

                                        </div>
                                    </div>
                                </div>
                                <p class="text-blueGray-400 mt-4 text-sm">
                                    <span class="mr-2 text-red-500">
                                        <i class="fas fa-arrow-down"></i> 3.48%
                                    </span>
                                    <span class="whitespace-nowrap"> Since last week </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                        <div class="relative mb-6 flex min-w-0 flex-col break-words rounded bg-white shadow-lg xl:mb-0">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full max-w-full flex-1 flex-grow pr-4">
                                        <h5 class="text-blueGray-400 text-xs font-bold uppercase">
                                            Sales
                                        </h5>
                                        <span class="text-blueGray-700 text-xl font-semibold">
                                            924
                                        </span>
                                    </div>
                                    <div class="relative w-auto flex-initial pl-4">
                                        <div
                                            class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-pink-500 p-3 text-center text-white shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z" />
                                            </svg>

                                        </div>
                                    </div>
                                </div>
                                <p class="text-blueGray-400 mt-4 text-sm">
                                    <span class="mr-2 text-orange-500">
                                        <i class="fas fa-arrow-down"></i> 1.10%
                                    </span>
                                    <span class="whitespace-nowrap"> Since yesterday </span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="w-full px-4 lg:w-6/12 xl:w-3/12">
                        <div class="relative mb-6 flex min-w-0 flex-col break-words rounded bg-white shadow-lg xl:mb-0">
                            <div class="flex-auto p-4">
                                <div class="flex flex-wrap">
                                    <div class="relative w-full max-w-full flex-1 flex-grow pr-4">
                                        <h5 class="text-blueGray-400 text-xs font-bold uppercase">
                                            Performance
                                        </h5>
                                        <span class="text-blueGray-700 text-xl font-semibold">
                                            49,65%
                                        </span>
                                    </div>
                                    <div class="relative w-auto flex-initial pl-4">
                                        <div
                                            class="inline-flex h-12 w-12 items-center justify-center rounded-full bg-blue-500 p-3 text-center text-white shadow-lg">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M15.59 14.37a6 6 0 01-5.84 7.38v-4.8m5.84-2.58a14.98 14.98 0 006.16-12.12A14.98 14.98 0 009.631 8.41m5.96 5.96a14.926 14.926 0 01-5.841 2.58m-.119-8.54a6 6 0 00-7.381 5.84h4.8m2.581-5.84a14.927 14.927 0 00-2.58 5.84m2.699 2.7c-.103.021-.207.041-.311.06a15.09 15.09 0 01-2.448-2.448 14.9 14.9 0 01.06-.312m-2.24 2.39a4.493 4.493 0 00-1.757 4.306 4.493 4.493 0 004.306-1.758M16.5 9a1.5 1.5 0 11-3 0 1.5 1.5 0 013 0z" />
                                            </svg>

                                        </div>
                                    </div>
                                </div>
                                <p class="text-blueGray-400 mt-4 text-sm">
                                    <span class="mr-2 text-emerald-500">
                                        <i class="fas fa-arrow-up"></i> 12%
                                    </span>
                                    <span class="whitespace-nowrap">
                                        Since last month
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- end content --}}
    </div>
</x-app-layout>
