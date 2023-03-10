<?php

namespace App\Http\Livewire;

use App\Models\Setup;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Payment extends Component
{
    use LivewireAlert;

    protected $listeners = [
        'confirmedYt',
        'confirmedPayment',
    ];

    public Setup $setup;

    public function mount()
    {
        $this->setup = Setup::find(1)->first();
    }

    public function render()
    {
        return view('livewire.payment');
    }

    public function askBank()
    {
        $this->alert('info', 'Pembayaran Youtube', [
            'html' => 'Subscribe dan Berlangganan Akun Youtube <br/><br/> Silahkan kirim bukti pendaftaran dan bukti berlangganan Youtube ke nomor whatsapp admin',
            'position' => 'center',
            'timer' => 10000,
            'toast' => false,
            'showConfirmButton' => true,
            'onConfirmed' => '',
            'showDenyButton' => true,
            'onDenied' => '',
            'showCancelButton' => false,
            'onDismissed' => '',
            'denyButtonText' => 'Konfirmasi Pembayaran',
            'confirmButtonText' => 'Subscribe',
            'onDenied' => 'confirmedPayment',
            'onConfirmed' => 'confirmedYt',
           ]);
    }

    public function confirmedYt()
    {
        $this->dispatchBrowserEvent('confirmedYt', ['link' => $this->setup->youtube]);
    }

    public function confirmedPayment()
    {
        $link = 'https://api.whatsapp.com/send/?phone= ' . $this->setup->admin_phone . ' &text=Saya+baru+saja+mendaftar+di+Test+Hilang.%0A%0ANama%3A+'.auth()->user()->name.'%0AID%3A+'.auth()->id().'&type=phone_number&app_absent=0';
        $this->dispatchBrowserEvent('confirmedPayment', ['link' => $link]);
    }

    public function confirmedShopee()
    {
        $link = 'https://api.whatsapp.com/send/?phone= ' . $this->setup->admin_phone . ' &text=Saya+baru+saja+mendaftar+di+Test+Hilang.%0A%0ANama%3A+'.auth()->user()->name.'%0AID%3A+'.auth()->id().'&type=phone_number&app_absent=0';
        $this->dispatchBrowserEvent('confirmedPayment', ['link' => $link]);
    }

    public function confirmedOvo()
    {
        $link = 'https://api.whatsapp.com/send/?phone= ' . $this->setup->admin_phone . ' &text=Saya+baru+saja+mendaftar+di+Test+Hilang.%0A%0ANama%3A+'.auth()->user()->name.'%0AID%3A+'.auth()->id().'&type=phone_number&app_absent=0';
        $this->dispatchBrowserEvent('confirmedPayment', ['link' => $link]);
    }
}
