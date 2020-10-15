<?php

namespace App\Http\Livewire;

use App\Imunisasi;
use Livewire\Component;
use Livewire\WithPagination;

class ImunisasiIndex extends Component
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

    public $pasienId, $users_id, $nm_ibu, $nm_ayah,  $no_tlpn, $alamat;
    public $imunisasiId, $nm_anak, $tgl_lahir, $umur, $jns_imunisasi, $bb, $pb;

    public function render()
    {
        if (!empty($this->pasienId)) {
            return view('livewire.imunisasi-index', [
                'pasienId' => $this->pasienId,
                'nm_ibu' => $this->nm_ibu,
                'nm_ayah' => $this->nm_ayah,
                'no_tlpn' => $this->no_tlpn,
                'alamat' => $this->alamat,
                'imunisasi' => Imunisasi::select('id', 'nm_anak', 'tgl_lahir', 'umur', 'jns_imunisasi', 'bb', 'pb')->where('pasien_id', $this->pasienId)->orderBy('id', 'desc')->paginate($this->paginate)
            ]);
        }else{
            return view('livewire.imunisasi-index', [
                'imunisasi' => Imunisasi::join('pasien', 'pasien.id', '=', 'imunisasi.pasien_id')->select('imunisasi.id', 'nm_ibu','kd_pasien', 'nm_anak', 'tgl_lahir', 'umur', 'jns_imunisasi', 'bb', 'pb')->where('kd_pasien','like', '%'.$this->search.'%')->orWhere('nm_ibu','like', '%'.$this->search.'%')->orWhere('nm_ayah','like', '%'.$this->search.'%')->orderBy('imunisasi.id', 'desc')->paginate($this->paginate)
            ]);
        }
    }

    public function store(){
        $this->validate([
            'nm_anak' => 'required',
            'jns_imunisasi' => 'required'
        ]);

        Imunisasi::create([
            "users_id" => $this->users_id,
            "pasien_id" => $this->pasienId,
            "nm_anak" => $this->nm_anak,
            "tgl_lahir" => $this->tgl_lahir,
            "umur" => $this->umur,
            "jns_imunisasi" => $this->jns_imunisasi,
            "bb" => $this->bb,
            "pb" => $this->pb
        ]);

        $this->resetInput();//panggil methodnya
        $this->emit('imunisasiStored');   
    }

    public function resetInput(){// function agar mengkosongkan form input
        $this->imunisasiId = null;
        $this->nm_anak = null;
        $this->tgl_lahir = null;
        $this->umur = null;
        $this->jns_imunisasi = null;
        $this->bb = null;
        $this->pb = null;
    }
    public function getImunisasi($id){
        $imunisasi = Imunisasi::find($id);
        $this->imunisasiId = $imunisasi['id'];
        $this->nm_anak = $imunisasi['nm_anak'];
        $this->tgl_lahir = $imunisasi['tgl_lahir'];
        $this->umur = $imunisasi['umur'];
        $this->jns_imunisasi = $imunisasi['jns_imunisasi'];
        $this->bb = $imunisasi['bb'];
        $this->pb = $imunisasi['pb'];
    }

    public function deleteImunisasi($imunisasiId){
        $data = Imunisasi::find($imunisasiId);
        $data->delete();
        $this->resetInput();
        $this->emit('imunisasiDeleted'); 
    }

    public function update(){
        $this->validate([
            'nm_anak' => 'required',
            'jns_imunisasi' => 'required'
        ]);
        
        if(!empty($this->imunisasiId)){
            $imunisasi = Imunisasi::find($this->imunisasiId);
            $imunisasi->update([
                "users_id" => $this->users_id,
                "nm_anak" => $this->nm_anak,
                "tgl_lahir" => $this->tgl_lahir,
                "umur" => $this->umur,
                "jns_imunisasi" => $this->jns_imunisasi,
                "bb" => $this->bb,
                "pb" => $this->pb
                ]);

            $this->resetInput();
            $this->emit('imunisasiUpdated');
        }
    }
}
