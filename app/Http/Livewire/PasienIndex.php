<?php

namespace App\Http\Livewire;

use App\Pasien;
use Livewire\Component;

class PasienIndex extends Component
{
    public function render()
    {
        return view('livewire.pasien-index',[
            'pasien' => Pasien::select('*')->get()
        ]);
    }
}
