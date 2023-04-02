<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto flex flex-col gap-2 p-2 sm:flex-row" x-data="plan">
        <x-card title="{{ __('Paket Langganan') }}" class="w-full shrink grow">
            <x-slot name="action">
                <x-card.action-link id="create" label="Create" />
            </x-slot>
            <livewire:subscription-table />
        </x-card>
    </div>

    @push('scripts')
        <script>
            document.addEventListener('alpine:init', () => {
                Alpine.data('plan', () => ({
                    plan: null,
                    askEdit(id) {
                        let urlGet = '{{ route('plan.show', '') }}';
                        urlGet += '/' + id;
                        console.log(urlGet);

                        axios.get(urlGet)
                            .then(response => {
                                this.plan = response.data;
                                this.proccess(id);
                            })
                            .catch(error => {
                                console.log(error);
                            });
                    },
                    async proccess(id) {
                        let urlPost = '{{ route('plan.update', '') }}';
                        urlPost += '/' + id;
                        const {
                            value: formValues
                        } = await Swal.fire({
                            title: 'Create Plan',
                            showCancelButton: true,
                            html: `<input name="name" placeholder="Name" value="${this.plan.name}"  id="swal-input1" class="swal2-input">` +
                                `<input name="attempt" placeholder="Attempt" value="${this.plan.attempt}" id="swal-input2" class="swal2-input">` +
                                `<input name="price" placeholder="Price" value="${this.plan.price}" id="swal-input3" class="swal2-input">` +
                                `<input name="id" value="id" type="hidden" value="${this.plan.id}" id="swal-input4" class="swal2-input">` +
                                `<input name="status" value="${this.plan.status}" id="swal-input5" class="swal2-input">` +
                                `<input name="days" value="${this.plan.days}" id="swal-input6" class="swal2-input">`,
                            focusConfirm: false,
                            preConfirm: () => {
                                return {
                                    name: document.getElementById('swal-input1')
                                        .value
                                        .toUpperCase(),
                                    attempt: document.getElementById(
                                            'swal-input2')
                                        .value
                                        .toUpperCase(),
                                    price: document.getElementById(
                                            'swal-input3')
                                        .value
                                        .toUpperCase(),
                                    id: document.getElementById('swal-input4')
                                        .value,
                                    status: document.getElementById(
                                            'swal-input5')
                                        .value,
                                    days: document.getElementById(
                                            'swal-input6')
                                        .value
                                }

                            }
                        });

                        if (formValues) {
                            console.log('urlPost', urlPost);
                            axios.post(urlPost, {
                                    name: formValues.name,
                                    attempt: formValues.attempt,
                                    price: formValues.price,
                                    id: formValues.id,
                                    status: formValues.status,
                                    days: formValues.days,
                                    _method: 'PUT'
                                })
                                .then((response) => {
                                    console.log(response.data);
                                    Swal.fire({
                                        icon: 'success',
                                        title: response.data.plan +
                                            ' Berhasil di update',
                                    });
                                    Livewire.emit('refreshComponent');
                                })
                                .catch(error => {
                                    const errors = error.response.data.errors
                                    console.log(errors);
                                    let errorString = '';
                                    for (let key in errors) {
                                        errorString += `${errors[key].join('\n')}\n`;
                                    }
                                    Swal.fire({
                                        icon: 'error',
                                        title: 'Error',
                                        text: errorString
                                    })
                                });
                        }
                    },
                    init() {

                    }
                }))
            })
        </script>
        <script>
            const myButton = document.getElementById('create');

            async function createPlan() {
                const {
                    value: formValues
                } = await Swal.fire({
                    title: 'Create Plan',
                    showCancelButton: true,
                    html: '<input name="name" placeholder="Name" id="swal-input1" class="swal2-input">' +
                        '<input name="attempt" placeholder="Attempt" type="number" id="swal-input2" class="swal2-input">' +
                        '<input name="price" placeholder="Price" type="number" id="swal-input3" class="swal2-input">' +
                        '<input name="status" value="AC" type="hidden" id="swal-input4" class="swal2-input">' +
                        '<input name="days" placeholder="Day" type="number" id="swal-input5" class="swal2-input">',
                    focusConfirm: false,
                    preConfirm: () => {
                        return {
                            name: document.getElementById('swal-input1').value.toUpperCase(),
                            attempt: document.getElementById('swal-input2').value.toUpperCase(),
                            price: document.getElementById('swal-input3').value.toUpperCase(),
                            status: document.getElementById('swal-input4').value,
                            days: document.getElementById('swal-input5').value
                        }

                    }
                })

                if (formValues) {
                    let url = '{{ route('plan.store') }}';
                    axios.post(url, formValues)
                        .then((response) => {
                            console.log(response.data);
                            Swal.fire({
                                icon: 'success',
                                title: response.data.plan + ' Berhasil di buat',
                            });
                            Livewire.emit('refreshComponent');
                        })
                        .catch(error => {
                            const errors = error.response.data.errors
                            console.log(errors);
                            let errorString = '';
                            for (let key in errors) {
                                errorString += `${errors[key].join('\n')}\n`;
                            }
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: errorString
                            })
                        });
                }
            }

            // Add a click event listener to the button
            myButton.addEventListener('click', () => {
                createPlan();
            });
        </script>
    @endpush
</x-app-layout>
