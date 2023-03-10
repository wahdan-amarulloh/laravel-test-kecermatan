<?php

namespace App\Http\Livewire;

use App\Models\Setup;
use App\Models\Subscription;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Payment extends Component
{
    use LivewireAlert;

    protected $listeners = [
        'confirmedYt',
        'confirmedPayment',
        'confirmedShopee',
        'confirmedDana',
        'confirmedOvo',
    ];

    public Setup $setup;
    public $plans;
    public $plan;

    public function mount()
    {
        $this->setup = Setup::find(1)->first();
        $this->plans = Subscription::where('status', 'AC')->get();
    }

    public function render()
    {
        return view('livewire.payment');
    }

    public function askYoutube()
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

    public function askBank()
    {
        $bca = $this->setup->bca;
        $this->alert('info', 'Pembayaran Bank', [
            'text' => 'Silahkan kirim bukti pendaftaran dan bukti transfer bank BCA dengan no rek '.(string) $bca,
            'position' => 'center',
            'timer' => 10000,
            'toast' => false,
            'showConfirmButton' => false,
            'onConfirmed' => '',
            'showDenyButton' => true,
            'onDenied' => '',
            'showCancelButton' => false,
            'onDismissed' => '',
            'denyButtonText' => 'Konfirmasi Pembayaran',
            'confirmButtonText' => 'Bayar',
            'onDenied' => 'confirmedPayment',
            'onConfirmed' => 'confirmedYt',
           ]);
    }

    public function askShopee()
    {
        $this->alert('info', 'Pembayaran Shopee', [
            'text' => 'Silahkan kirim bukti pendaftaran dan bukti transfer ke nomor whatsapp admin',
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
            'confirmButtonText' => 'Bayar',
            'onDenied' => 'confirmedPayment',
            'onConfirmed' => 'confirmedShopee',
           ]);
    }

    public function askDana()
    {
        $this->alert('info', 'Pembayaran Dana', [
            'text' => 'Silahkan kirim bukti pendaftaran dan bukti transfer ke nomor whatsapp admin',
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
            'confirmButtonText' => 'Bayar',
            'onDenied' => 'confirmedPayment',
            'onConfirmed' => 'confirmedDana',
           ]);
    }

    public function askOvo()
    {
        $this->alert('info', 'Pembayaran Ovo', [
            'text' => 'Silahkan kirim bukti pendaftaran dan bukti transfer ke nomor whatsapp admin',
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
            'confirmButtonText' => 'Bayar',
            'onDenied' => 'confirmedPayment',
            'onConfirmed' => 'confirmedOvo',
           ]);
    }

    public function confirmedYt()
    {
        $this->dispatchBrowserEvent('confirmedYt', ['link' => $this->setup->youtube]);
    }

    public function confirmedPayment()
    {
        $link = 'https://api.whatsapp.com/send/?phone= ' . $this->setup->admin_phone . ' &text=Saya+baru+saja+mendaftar+di+Test+Hilang.%0A%0ANama%3A+'.auth()->user()->name.'%0AID%3A+ '.auth()->id().' Tipe paket '. $this->plan .' &type=phone_number&app_absent=0';
        $this->dispatchBrowserEvent('confirmedPayment', ['link' => $link]);
    }

    public function confirmedShopee()
    {
        $this->dispatchBrowserEvent('confirmedPayment', ['link' => $this->setup->shopee ]);
    }

    public function confirmedOvo()
    {
        $this->dispatchBrowserEvent('confirmedPayment', ['link' => $this->setup->ovo ]);
    }

    public function confirmedDana()
    {
        $this->dispatchBrowserEvent('confirmedPayment', ['link' => $this->setup->dana ]);
    }
}
