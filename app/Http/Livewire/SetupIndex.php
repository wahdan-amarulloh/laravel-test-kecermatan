<?php

namespace App\Http\Livewire;

use App\Models\Setup;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class SetupIndex extends Component
{
    use LivewireAlert;
    public Setup $setup;

    protected $rules = [
        'setup.admin_phone' => 'required|string|min:6',
        'setup.bca' => 'required|string|max:500',
        'setup.youtube' => 'required|string|max:500',
        'setup.shopee' => 'required|string|max:500',
        'setup.dana' => 'required|string|max:500',
        'setup.ovo' => 'required|string|max:500',
    ];

    public function mount()
    {
        $this->setup = Setup::firstOrNew(
            ['id' => 1],
        );
    }

    public function save()
    {
        $this->validate();
        $this->setup->save();

        $this->alert('success', 'Data berhasil di simpan', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'showDenyButton' => false,
            'onDenied' => '',
            'showCancelButton' => false,
            'onDismissed' => '',
            'denyButtonText' => 'Konfirmasi Pembayaran',
            'confirmButtonText' => 'Ok',
           ]);
    }

    public function render()
    {
        return view('livewire.setup-index');
    }
}
