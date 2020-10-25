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
                'persalinan' => Persalinan::select('id', 'tgl_lahir', 'jam_lahir', 'hamil_ke', 'umur_hamil', 'anc_ke', 'letak_janin', 'jenis_persalinan', 'lahir', 'jenkel', 'kembar', 'bb', 'pb', 'lk', 'rujuk')->where([['pasien_id', '=', $this->pasienId],['persalinan.status','=','0']])->orderBy('persalinan.id', 'desc')->paginate($this->paginate)
            ]);
        }else{
            return view('livewire.persalinan-index', [
                'persalinan' => empty($this->search) ?
                 Persalinan::join('pasien', 'pasien.id', '=', 'persalinan.pasien_id')->select('persalinan.id','kd_pasien','nm_ibu', 'tgl_lahir', 'jam_lahir', 'hamil_ke', 'umur_hamil', 'anc_ke', 'letak_janin', 'jenis_persalinan', 'lahir', 'jenkel', 'kembar', 'bb', 'pb', 'lk', 'rujuk')->where('persalinan.status','0')->orderBy('persalinan.id', 'desc')->paginate($this->paginate):
                 Persalinan::join('pasien', 'pasien.id', '=', 'persalinan.pasien_id')->select('persalinan.id','kd_pasien','nm_ibu', 'tgl_lahir', 'jam_lahir', 'hamil_ke', 'umur_hamil', 'anc_ke', 'letak_janin', 'jenis_persalinan', 'lahir', 'jenkel', 'kembar', 'bb', 'pb', 'lk', 'rujuk')
                 ->where('kd_pasien','like', '%'.$this->search.'%')->orWhere('nm_ibu','like', '%'.$this->search.'%')->orWhere('nm_ayah','like', '%'.$this->search.'%')
                 ->orderBy('persalinan.id', 'desc')->paginate($this->paginate)
            ]);
        }
    }

    public function store(){
        $message = [
            'max' => 'Maksimal hanya :max karakter',
            'numeric' => 'Inputan harus berupa angka',
            'date' => 'Inputan harus berupa tanggal',
            'required' => 'Inputan tidak boleh kosong'
        ];
        $this->validate([
            "anc_ke" => 'max:254|numeric|nullable',
            "rujuk" => 'max:30',
            "tgl_lahir" => 'required|date',
            "jam_lahir" => 'required|max:30',
            "hamil_ke" => 'required|max:254|numeric',
            "umur_hamil" => 'required|max:10',
            "letak_janin" => 'required|max:10',
            "jenis_persalinan" => 'required|max:10',
            "lahir" => 'required|max:1',
            "jenkel" => 'required|max:1',
            "kembar" => 'required|max:30',
            "bb" => 'required|max:65500|numeric',
            "pb" => 'required|max:254|numeric',
            "lk" => 'required|max:254|numeric'
        ], $message);

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
        $this->letak_janin = $persalinan['letak_janin'];
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
        $data->update([
            'status' => '1',
            'users_id' => $this->users_id
        ]);
        $this->resetInput();
        $this->emit('persalinanDeleted');
    }

    public function update(){
        $message = [
            'max' => 'Maksimal hanya :max karakter',
            'numeric' => 'Inputan harus berupa angka',
            'date' => 'Inputan harus berupa tanggal',
            'required' => 'Inputan tidak boleh kosong'
        ];
        $this->validate([
            "anc_ke" => 'max:254|numeric|nullable',
            "rujuk" => 'max:30',
            "tgl_lahir" => 'required|date',
            "jam_lahir" => 'required|max:30',
            "hamil_ke" => 'required|max:254|numeric',
            "umur_hamil" => 'required|max:10',
            "letak_janin" => 'required|max:10',
            "jenis_persalinan" => 'required|max:10',
            "lahir" => 'required|max:1',
            "jenkel" => 'required|max:1',
            "kembar" => 'required|max:30',
            "bb" => 'required|max:65500|numeric',
            "pb" => 'required|max:254|numeric',
            "lk" => 'required|max:254|numeric'
        ], $message);

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
