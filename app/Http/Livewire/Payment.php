<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Payment extends Component
{
    use LivewireAlert;

    public function render()
    {
        return view('livewire.payment');
    }

    public function askBank()
    {
        $this->alert('info', 'Hello!', [
            'position' => 'center',
            'timer' => 3000,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'showDenyButton' => true,
            'onDenied' => '',
            'showCancelButton' => false,
            'onDismissed' => '',
            'denyButtonText' => 'Konfirmasi Pembayaran',
            'confirmButtonText' => 'Bayar',
           ]);
    }
}
