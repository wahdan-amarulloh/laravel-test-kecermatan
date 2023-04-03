<div class="mx-auto p-2">
    <x-card x-data="group" title="Group" id="group">
        <x-slot name="action">
            <x-card.action-link @click="showModal()" id="create" label="Create" />
        </x-slot>
        <livewire:group-table />
    </x-card>
</div>

@pushOnce('scripts')
    <script>
        document.addEventListener("alpine:init", () => {
            Alpine.data("group", () => ({
                formValues: null,
                async showModal() {
                    let url = '{{ route('groups.index') }}';
                    this.formValues = await Swal.fire({
                        title: 'Multiple inputs',
                        target: 'table',
                        html: '<input id="swal-input1" class="swal2-input">' +
                            '<input type="hidden" id="swal-input2" class="swal2-input">',
                        focusConfirm: false,
                        preConfirm: () => {
                            return {
                                name: document.getElementById('swal-input1').value
                            }
                        }
                    });

                    if (this.formValues) {

                        axios.post(url, {
                                name: this.formValues.value.name,
                            })
                            .then((response) => {
                                console.log(response.data);
                                Swal.fire({
                                    icon: 'success',
                                    title: `${response.data.group.name} Berhasil di update`,
                                });
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
                    console.log('init');
                }
            }));
        });
    </script>
@endPushOnce
