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

    //variable form
    public $pasienId,$nik_ibu, $nik_ayah, $nm_ibu, $nm_ayah, $tgl_lahir_ibu, $tgl_lahir_ayah, $no_tlpn, $alamat;
    

    public function mount(){
        $this->fill(request()->only('search', 'page'));
    }

    public function render()
    {
        return view('livewire.pasien-index',[
            'pasien' => $this->search === null ?
             Pasien::select('id','kd_pasien','nik_ayah','nik_ibu','nm_ayah','nm_ibu','no_tlpn','alamat','created_at')->paginate($this->paginate) :
             Pasien::select('id','kd_pasien','nik_ayah','nik_ibu','nm_ayah','nm_ibu','no_tlpn','alamat','created_at')->where('kd_pasien','like', '%'.$this->search.'%')
             ->orWhere('nik_ibu','like', '%'.$this->search.'%')
             ->orWhere('nm_ibu','like', '%'.$this->search.'%')
             ->orWhere('nik_ayah','like', '%'.$this->search.'%')
             ->orWhere('nm_ayah','like', '%'.$this->search.'%')
             ->paginate($this->paginate)
        ]);
    }

    public function store(){
        $this->validate([
            'nm_ayah' => 'max:30',
            'nik_ayah' => 'max:30',
            'nik_ibu' => 'max:30',
            'nm_ibu' => 'required|min:3|max:30',
            'no_tlpn' => 'max:13',
            'alamat' => 'max:30',
        ]);

        Pasien::create([
            "nik_ayah" => $this->nik_ayah,
            "nik_ibu" => $this->nik_ibu,
            "nm_ayah" => $this->nm_ayah,
            "nm_ibu" => $this->nm_ibu,
            "tgl_lahir_ayah" => $this->tgl_lahir_ayah,
            "tgl_lahir_ibu" => $this->tgl_lahir_ibu,
            "no_tlpn" => $this->no_tlpn,
            "alamat" => $this->alamat
        ]);

        $this->resetInput();//panggil methodnya
        $this->emit('pasienStored');   
    }

    public function resetInput(){// function agar mengkosongkan form input
        $this->nik_ayah = null;
        $this->nik_ibu = null;
        $this->nm_ayah = null;
        $this->nm_ibu = null;
        $this->tgl_lahir_ayah = null;
        $this->tgl_lahir_ibu = null;
        $this->no_tlpn = null;
        $this->alamat = null;
    }

    public function getPasien($id){
        $pasien = Pasien::find($id);
        $this->pasienId = $pasien['id'];
        $this->nik_ayah = $pasien['nik_ayah'];
        $this->nik_ibu = $pasien['nik_ibu'];
        $this->nm_ayah = $pasien['nm_ayah'];
        $this->nm_ibu = $pasien['nm_ibu'];
        $this->tgl_lahir_ayah = $pasien['tgl_lahir_ayah'];
        $this->tgl_lahir_ibu = $pasien['tgl_lahir_ibu'];
        $this->no_tlpn = $pasien['no_tlpn'];
        $this->alamat = $pasien['alamat'];
    }

    public function deletePasien($pasienId){
        $data = Pasien::find($pasienId);
        $data->delete();
        $this->emit('pasienDeleted'); 
    }
    
    public function update(){
        $this->validate([
            'nm_ayah' => 'max:30',
            'nik_ayah' => 'max:30',
            'nik_ibu' => 'max:30',
            'nm_ibu' => 'required|min:3|max:30',
            'no_tlpn' => 'max:13',
            'alamat' => 'max:30',
        ]);
        
        if($this->pasienId){
            $contact = Pasien::find($this->pasienId);
            $contact->update([
            "nik_ayah" => $this->nik_ayah,
            "nik_ibu" => $this->nik_ibu,
            "nm_ayah" => $this->nm_ayah,
            "nm_ibu" => $this->nm_ibu,
            "tgl_lahir_ayah" => $this->tgl_lahir_ayah,
            "tgl_lahir_ibu" => $this->tgl_lahir_ibu,
            "no_tlpn" => $this->no_tlpn,
            "alamat" => $this->alamat
            ]);

            $this->resetInput();
            $this->emit('pasienUpdated');
        }
    }
}
