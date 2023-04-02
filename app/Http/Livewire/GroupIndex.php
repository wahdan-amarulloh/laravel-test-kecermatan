<?php

namespace App\Http\Livewire;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class GroupIndex extends Component
{
    use LivewireAlert;

    public function render()
    {
        return view('livewire.group-index');
    }
}
