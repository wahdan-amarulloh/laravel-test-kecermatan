<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto p-2">
        {{-- Put content here --}}

        {{-- info --}}
        {{-- <div class="mx-auto mt-3 w-full">
            <div>
                <div class="flex flex-wrap">
                    <div class="w-full p-0 md:basis-1/4 md:p-1">
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
                    <div class="w-full p-0 md:basis-1/4 md:p-1">
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
                    <div class="w-full p-0 md:basis-1/4 md:p-1">
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
                    <div class="w-full p-0 md:basis-1/4 md:p-1">
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
        </div> --}}
        {{-- end info --}}

        <div class="mx-auto mt-3 flex flex-col items-center items-stretch space-x-0 md:flex-row md:space-x-4">
            <x-card class="w-full md:basis-1/2" title="Profile">
                <div
                    class="flex flex-col divide-y divide-y font-mono text-sm font-bold leading-6 ltr:text-left rtl:text-right dark:divide-slate-700">
                    <div class="flex-row content-end justify-end">
                        <strong class="text-xl font-extrabold">Nama Lengkap :</strong>
                        <p class="mb-2">
                            <span class="">
                                {{ auth()->user()->name }}
                            </span>
                        </p>
                    </div>
                    <div class="flex-row content-end justify-end">
                        <strong class="text-xl font-extrabold">Email : </strong>
                        <p class="mb-2">
                            <span class="">
                                {{ auth()->user()->email }}
                            </span>
                        </p>
                    </div>
                    <div class="flex-row content-end justify-end">
                        <strong class="text-xl font-extrabold">Kota Asal :</strong>
                        <p class="mb-2">
                            <span class="">
                                {{ auth()->user()->city ?? '-' }}
                            </span>
                        </p>
                    </div>
                    <div class="flex-row content-end justify-end">
                        <strong class="text-xl font-extrabold">Nomor Whatsapp : </strong>
                        <p class="mb-2">
                            <span class="">
                                {{ auth()->user()->phone ?? '-' }}
                            </span>
                        </p>
                    </div>
                </div>
            </x-card>
            <x-card class="w-full md:basis-1/2" x-data="{
                activeTab: 0,
                tabs: [
                    'Status',
                    'Pembayaran',
                ]
            }">
                <x-slot name="close">
                    <ul class="mb-3 flex w-full items-center justify-center">
                        <template x-for="(tab, index) in tabs" :key="index">
                            <li class="cursor-pointer border-b-8 py-2 px-4 text-gray-500"
                                :class="activeTab === index ? 'text-indigo-500 border-indigo-500' : ''"
                                @click="activeTab = index" x-text="tab"></li>
                        </template>
                    </ul>
                </x-slot>
                <div x-show="activeTab===0">
                    <div
                        class="flex flex-col divide-y divide-y font-mono text-sm font-bold leading-6 ltr:text-left rtl:text-right dark:divide-slate-700">
                        <div class="flex-row content-end justify-end">
                            <strong class="text-xl font-extrabold">Paket Berlangganan :</strong>
                            <p class="mb-2">
                                <span class="">
                                    {{ auth()->user()->plan->name }}
                                </span>
                            </p>
                        </div>
                        <div class="flex-row content-end justify-end">
                            <strong class="text-xl font-extrabold">Sisa Waktu Berlangganan :</strong>
                            <p class="mb-2">
                                <span class="">
                                    {{ auth()->user()->expired_at? auth()->user()->expired_at->diffForHumans(['parts' => 3]): '-' }}
                                </span>
                            </p>
                        </div>
                        <div class="flex-row content-end justify-end">
                            <strong class="text-xl font-extrabold">Sisa Kuota Tes Kecermatan Hari Ini : </strong>
                            <p class="mb-2">
                                <span class="">
                                    {{ auth()->user()->plan->attempt - count($testLeft) }}
                                </span>
                            </p>
                        </div>
                    </div>
                </div>
                <div x-show="activeTab===1">
                    <livewire:payment />
                </div>
                <div x-show="activeTab===2">Content 3</div>
                <div x-show="activeTab===3">Content 4</div>
            </x-card>
        </div>

        {{-- member --}}
        <div x-data="detail(@js(request()->query('question')))"
            class="mx-auto mt-3 flex flex-col items-center items-stretch space-x-0 md:flex-row md:space-x-4">
            <x-card class="w-full" title="Riwayat Ujian">
                <div class="mt-0">
                    <div class="scrollbars flex max-h-[400px] w-full flex-col overflow-y-scroll">
                        @forelse ($histories as $key => $history)
                            <div class="my-3 flex items-center justify-between">
                                <span
                                    class="flex items-center rounded bg-gray-200 px-2 py-1 text-xs font-semibold text-gray-500">
                                    {{ $history->first()->test_at->diffForHumans() }}
                                </span>
                                <span
                                    class="flex items-center rounded bg-gray-200 px-2 py-1 text-xs font-semibold text-gray-500">
                                    {{ $history->first()->test_at }}
                                </span>
                            </div>
                            <div @click="getDetail(@js($key))"
                                class="group flex cursor-pointer items-center gap-x-5 rounded-md px-2.5 py-2 transition-all duration-75 hover:bg-green-100 dark:hover:bg-gray-700">
                                <div
                                    class="flex h-12 w-12 items-center rounded-lg bg-gray-200 text-black group-hover:bg-green-200">
                                    <span
                                        class="tag w-full text-center text-2xl font-medium text-gray-700 group-hover:text-green-900">
                                        <svg class="mx-auto h-6 w-6" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                        </svg>

                                    </span>
                                </div>
                                <div class="flex flex-row justify-between space-x-3 font-light text-gray-600">
                                    <span
                                        class="rounded border-slate-50 bg-indigo-50 px-2 py-1 text-xs font-semibold text-indigo-500">
                                        {{ $history->count() }} : Terjawab
                                    </span>
                                    <span
                                        class="rounded border-slate-50 bg-green-50 px-2 py-1 text-xs font-semibold text-green-500">
                                        {{ $history->sum('points') }} : Points
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div
                                class="group flex cursor-pointer items-center gap-x-5 rounded-md px-2.5 py-2 transition-all duration-75 hover:bg-green-100 dark:bg-gray-700">
                                <div
                                    class="flex h-12 w-12 items-center rounded-lg bg-gray-200 text-black group-hover:bg-green-200">
                                    <span
                                        class="tag w-full text-center text-2xl font-medium text-gray-700 group-hover:text-green-900">
                                        <svg class="mx-auto h-6 w-6" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="h-6 w-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                        </svg>

                                    </span>
                                </div>
                                <div
                                    class="flex flex-col items-start justify-between font-light text-gray-600 dark:text-gray-300">
                                    <p class="text-[15px]">Anda belum melakukan test</p>
                                    {{-- <span class="text-xs font-light text-gray-400">{{ now()->diffForHumans() }}</span> --}}
                                </div>
                            </div>
                        @endforelse
                    </div>
                </div>
            </x-card>

            <x-card class="w-full" title="Detail" x-show="id !== null">
                <div>
                    <canvas x-ref="canvas" id="myChart"></canvas>
                </div>
            </x-card>
        </div>
        {{-- end member --}}
        {{-- end content --}}
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('detail', (question) => ({
                    labels: ['0', '0', '0', '0'],
                    values: {
                        right: [4, 5, 6, 7],
                        wrong: [2, 3, 4, 5],
                    },
                    data: null,
                    id: null,
                    config: null,
                    canvasData: null,
                    async getDetail(id) {
                        this.id = id;

                        let url = '{{ route('test.show', '') }}';
                        url += '/' + id;

                        this.canvasData = axios.get(url)
                            .then(response => {
                                this.canvasData = response.data.detail;
                                this.build();
                            })
                            .catch(error => {
                                // Handle error
                                console.log(error);
                            });
                    },
                    build() {
                        const prefix = 'Kolom ';

                        const labels = Object.keys(this.canvasData).reduce((result, key) => {
                            result[prefix + key] = this.canvasData[key];
                            return result;
                        }, {});

                        this.labels = Object.keys(labels);

                        const trueAnswer = [];
                        const wrongAnswer = [];
                        for (const property in labels) {
                            trueAnswer.push(
                                labels[property][0].corrects
                            );
                            wrongAnswer.push(
                                labels[property][0].wrongs
                            )
                        };

                        // this.values = trueAnswer;
                        this.values.right = trueAnswer;
                        this.values.wrong = wrongAnswer;
                    },
                    init() {
                        this.data = {
                            labels: Object.keys(this.labels),
                            datasets: [{
                                    label: 'Jawaban Benar',
                                    data: this.values.right,
                                    borderWidth: 2,
                                    fill: false,
                                    tension: 0.1,
                                    pointStyle: 'circle',
                                    pointRadius: 5,
                                    pointHoverRadius: 15
                                },
                                {
                                    label: 'Jawaban Salah',
                                    data: this.values.wrong,
                                    borderWidth: 2,
                                    pointStyle: 'circle',
                                    pointRadius: 5,
                                    pointHoverRadius: 15
                                }
                            ]
                        };


                        this.config = {
                            type: 'line',
                            data: this.data,
                            options: {
                                scales: {
                                    y: {
                                        beginAtZero: true
                                    }
                                },
                                responsive: true,
                                animation: {
                                    y: {
                                        duration: 4000,
                                        from: 500
                                    }
                                },
                            }
                        };

                        let chart = new Chart(this.$refs.canvas.getContext('2d'), this.config);

                        if (question) {
                            this.getDetail(question);
                        }

                        this.$watch('labels', () => {
                            chart.data.labels = this.labels;
                            chart.data.datasets[0].data = this.values.right;
                            chart.data.datasets[1].data = this.values.wrong;
                            chart.update();
                        })
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
