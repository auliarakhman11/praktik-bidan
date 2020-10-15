<?php

namespace App\Http\Livewire;

use App\Persalinan;
use Livewire\Component;
use Livewire\WithPagination;

class PersalinanIndex extends Component
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
    public $pasienId, $users_id, $nm_ibu, $nm_ayah,  $no_tlpn, $alamat;
    public $persalinanId, $tgl_lahir, $jam_lahir, $hamil_ke, $umur_hamil, $anc_ke, $letak_janin, $jenis_persalinan, $lahir, $jenkel, $kembar, $bb, $pb, $lk, $rujuk;

    public function render()
    {
        if (!empty($this->pasienId)) {
            return view('livewire.persalinan-index', [
                'pasienId' => $this->pasienId,
                'nm_ibu' => $this->nm_ibu,
                'nm_ayah' => $this->nm_ayah,
                'no_tlpn' => $this->no_tlpn,
                'alamat' => $this->alamat,
                'persalinan' => Persalinan::select('id', 'tgl_lahir', 'jam_lahir', 'hamil_ke', 'umur_hamil', 'anc_ke', 'letak_janin', 'jenis_persalinan', 'lahir', 'jenkel', 'kembar', 'bb', 'pb', 'lk', 'rujuk')->where('pasien_id', $this->pasienId)->orderBy('id', 'desc')->paginate($this->paginate)
            ]);
        }else{
            return view('livewire.persalinan-index', [
                'persalinan' => Persalinan::join('pasien', 'pasien.id', '=', 'persalinan.pasien_id')->select('persalinan.id','kd_pasien','nm_ibu', 'tgl_lahir', 'jam_lahir', 'hamil_ke', 'umur_hamil', 'anc_ke', 'letak_janin', 'jenis_persalinan', 'lahir', 'jenkel', 'kembar', 'bb', 'pb', 'lk', 'rujuk')->where('kd_pasien','like', '%'.$this->search.'%')->orWhere('nm_ibu','like', '%'.$this->search.'%')->orWhere('nm_ayah','like', '%'.$this->search.'%')->orderBy('persalinan.id', 'desc')->paginate($this->paginate)
            ]);
        }
    }

    public function store(){
        $this->validate([
            'tgl_lahir' => 'required',
            'jam_lahir' => 'required',
            'hamil_ke' => 'required'
        ]);

        Persalinan::create([
            "users_id" => $this->users_id,
            "pasien_id" => $this->pasienId,
            "tgl_lahir" => $this->tgl_lahir,
            "jam_lahir" => $this->jam_lahir,
            "hamil_ke" => $this->hamil_ke,
            "umur_hamil" => $this->umur_hamil,
            "anc_ke" => $this->anc_ke,
            "letak_janin" => $this->letak_janin,
            "jenis_persalinan" => $this->jenis_persalinan,
            "lahir" => $this->lahir,
            "jenkel" => $this->jenkel,
            "kembar" => $this->kembar,
            "bb" => $this->bb,
            "pb" => $this->pb,
            "lk" => $this->lk,
            "rujuk" => $this->rujuk
        ]);

        $this->resetInput();//panggil methodnya
        $this->emit('persalinanStored');   
    }

    public function resetInput(){// function agar mengkosongkan form input
        $this->persalinanId = null;
        $this->tgl_lahir = null;
        $this->jam_lahir = null;
        $this->hamil_ke = null;
        $this->umur_hamil = null;
        $this->anc_ke = null;
        $this->letak_janin = null;
        $this->jenis_persalinan = null;
        $this->lahir = null;
        $this->jenkel = null;
        $this->kembar = null;
        $this->bb = null;
        $this->pb = null;
        $this->lk = null;
        $this->rujuk = null;
    }

    public function getPersalinan($id){
        $persalinan = Persalinan::find($id);
        $this->persalinanId = $persalinan['id'];
        $this->tgl_lahir = $persalinan['tgl_lahir'];
        $this->jam_lahir = $persalinan['jam_lahir'];
        $this->hamil_ke = $persalinan['hamil_ke'];
        $this->umur_hamil = $persalinan['umur_hamil'];
        $this->anc_ke = $persalinan['anc_ke'];
        $this->letak_janin = $persalinan['letk_janin'];
        $this->jenis_persalinan = $persalinan['jenis_persalinan'];
        $this->lahir = $persalinan['lahir'];
        $this->jenkel = $persalinan['jenkel'];
        $this->kembar = $persalinan['kembar'];
        $this->bb = $persalinan['bb'];
        $this->pb = $persalinan['pb'];
        $this->lk = $persalinan['lk'];
        $this->rujuk = $persalinan['rujuk'];
    }

    public function deletePersalinan($persalinanId){
        $data = Persalinan::find($persalinanId);
        $data->delete();
        $this->resetInput();
        $this->emit('persalinanDeleted');
    }

    public function update(){
        $this->validate([
            'tgl_lahir' => 'required',
            'jam_lahir' => 'required',
            'hamil_ke' => 'required'
        ]);

        if(!empty($this->persalinanId)){
            $persalinan = Persalinan::find($this->persalinanId);
            $persalinan->update([
                "users_id" => $this->users_id,
                "tgl_lahir" => $this->tgl_lahir,
                "jam_lahir" => $this->jam_lahir,
                "hamil_ke" => $this->hamil_ke,
                "umur_hamil" => $this->umur_hamil,
                "anc_ke" => $this->anc_ke,
                "letak_janin" => $this->letak_janin,
                "jenis_persalinan" => $this->jenis_persalinan,
                "lahir" => $this->lahir,
                "jenkel" => $this->jenkel,
                "kembar" => $this->kembar,
                "bb" => $this->bb,
                "pb" => $this->pb,
                "lk" => $this->lk,
                "rujuk" => $this->rujuk
            ]);

            $this->resetInput();
            $this->emit('persalinanUpdated');
        }
    }
}
