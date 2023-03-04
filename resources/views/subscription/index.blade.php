<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="mx-auto p-2">
        <x-card title="{{ __('Plan') }}">
            <x-slot name="action">
                <x-card.action-link id="create" label="Create" />
            </x-slot>
            <livewire:subscription-table />
        </x-card>
    </div>

    @push('scripts')
        <script>
            const myButton = document.getElementById('create');

            async function createPlan() {
                const {
                    value: formValues
                } = await Swal.fire({
                    title: 'Create Plan',
                    showCancelButton: true,
                    html: '<input name="name" placeholder="Name" id="swal-input1" class="swal2-input">' +
                        '<input name="attempt" placeholder="Attempt" id="swal-input2" class="swal2-input">' +
                        '<input name="status" value="AC" type="hidden" id="swal-input3" class="swal2-input">',
                    focusConfirm: false,
                    preConfirm: () => {
                        return {
                            name: document.getElementById('swal-input1').value.toUpperCase(),
                            attempt: document.getElementById('swal-input2').value.toUpperCase(),
                            status: document.getElementById('swal-input3').value
                        }

                    }
                })

                if (formValues) {
                    axios.post('http://127.0.0.1:8000/api/questions', formValues)
                        .then((response) => {
                            console.log(response.data);
                            Swal.fire({
                                icon: 'success',
                                title: response.data.plan + ' Berhasil di buat',
                            })
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
