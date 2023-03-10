<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto p-2">

        <x-card x-data="users()" title="{{ __('Users') }}">
            {{-- <x-slot name="action">
                <x-card.action-link href="{{ route('subscription.create') }}" label="Create" />
            </x-slot> --}}
            <livewire:user-table />
        </x-card>

    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('users', () => ({
                    current: null,
                    plans: null,
                    async getPlan() {
                        let url = '{{ route('plan.index') }}';
                        axios.get(url)
                            .then(response => {
                                this.plans = response.data;
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    },
                    async askEdit(id) {
                        const {
                            value: plan
                        } = await Swal.fire({
                            title: 'Paket Berlangganan',
                            input: 'select',
                            inputOptions: this.plans,
                            inputPlaceholder: 'Pilih Paket',
                            showCancelButton: true,
                        })

                        if (plan) {
                            url = '{{ route('plan.user', '') }}';
                            axios.post(url + '/' + id, {
                                    plan: plan
                                })
                                .then(response => {
                                    Swal.fire('Succes update plan');
                                    Livewire.emit('refreshComponent');
                                })
                                .catch(error => {
                                    // Handle error
                                    console.log(error);
                                });
                        }
                    },
                    init() {
                        this.$nextTick(() => {
                            this.getPlan()
                        });
                    }
                }))
            })
        </script>
    @endpush
</x-app-layout>
