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
                id: null,
                createRoute: '{{ route('groups.store') }}',
                updateRoute: '{{ route('groups.update', 'id') }}',
                destroyRoute: '{{ route('groups.destroy', 'id') }}',
                async showModal(id = null, type = 'create') {
                    console.log(type);
                    if (type === 'delete') {
                        this.deleteGroup(id);
                        return;
                    }

                    this.formValues = await Swal.fire({
                        title: type === 'create' ? 'Create Group' : `Edit Group ${id}`,
                        target: 'table',
                        html: `<input id="swal-input1" value="${this.formValues?.value?.name ?? ''}" placeholder="Group Name" class="swal2-input">`,
                        focusConfirm: true,
                        preConfirm: () => {
                            return {
                                name: document.getElementById('swal-input1').value
                            }
                        }
                    });

                    if (type === 'create') {
                        this.createGroup();
                    } else {
                        this.editGroup(id);
                    }
                    Livewire.emit('refreshComponent');
                },
                editGroup(id) {
                    if (this.formValues) {
                        axios.put(this.updateRoute.replace('id', id), {
                                name: this.formValues.value.name,
                            })
                            .then((response) => {
                                console.log(response.data);
                                Swal.fire({
                                    icon: 'success',
                                    title: `${response.data.group.name} Berhasil di simpan`,
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
                        this.formValues = null
                    }
                },
                deleteGroup(id) {
                    Swal.fire({
                        icon: 'question',
                        title: 'Do you want to delete ?',
                        showCancelButton: true,
                        confirmButtonText: 'Save',
                    }).then((result) => {
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
                            axios.delete(this.destroyRoute.replace('id', id))
                                .then(response => {
                                    Swal.fire('Group Deleted', '', 'info')
                                    Livewire.emit('refreshComponent');
                                })
                                .catch(error => {
                                    console.log(error.response.data.message);
                                });


                        } else if (result.isDenied) {
                            Swal.fire('Changes are not saved', '', 'info')
                        }
                    })
                },
                createGroup() {
                    if (this.formValues) {
                        axios.post(this.createRoute, {
                                name: this.formValues.value.name,
                            })
                            .then((response) => {
                                console.log(response.data);
                                Swal.fire({
                                    icon: 'success',
                                    title: `${response.data.group.name} Berhasil di simpan`,
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
