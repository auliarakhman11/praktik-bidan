<?php

namespace App\Http\Livewire;

use App\Pasien;
use Livewire\Component;
use Livewire\WithPagination;

class PasienIndex extends Component
{
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 5;//nilai default pagitantion

    //search
    public $foo;
    public $search = '';
    public $page = 1;
    protected $queryString = [
        'foo',
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];
    

    public function mount(){
        $this->fill(request()->only('search', 'page'));
    }

    public function render()
    {
        return view('livewire.pasien-index',[
            'pasien' => $this->search === null ?
             Pasien::select('nik_ayah','nik_ibu','nm_ayah','nm_ibu','no_tlpn','alamat','created_at')->paginate($this->paginate) :
             Pasien::select('nik_ayah','nik_ibu','nm_ayah','nm_ibu','no_tlpn','alamat','created_at')->where('nik_ibu','like', '%'.$this->search.'%')
             ->orWhere('nm_ibu','like', '%'.$this->search.'%')
             ->orWhere('nik_ayah','like', '%'.$this->search.'%')
             ->orWhere('nm_ayah','like', '%'.$this->search.'%')
             ->paginate($this->paginate)
        ]);
    }
    
}
