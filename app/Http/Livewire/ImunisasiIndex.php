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
                'imunisasi' => Imunisasi::select('id', 'nm_anak', 'tgl_lahir', 'umur', 'jns_imunisasi', 'bb', 'pb','imunisasi.created_at')->where([['pasien_id','=', $this->pasienId],['imunisasi.status','=','0']])->orderBy('id', 'desc')->paginate($this->paginate)
            ]);
        }else{
            return view('livewire.imunisasi-index', [
                'imunisasi' => empty($this->search) ?
                 Imunisasi::join('pasien', 'pasien.id', '=', 'imunisasi.pasien_id')->select('imunisasi.id', 'nm_ibu','kd_pasien', 'nm_anak', 'tgl_lahir', 'umur', 'jns_imunisasi', 'bb', 'pb','imunisasi.created_at')->where('imunisasi.status','0')
                 ->orderBy('imunisasi.id', 'desc')->paginate($this->paginate):
                 Imunisasi::join('pasien', 'pasien.id', '=', 'imunisasi.pasien_id')->select('imunisasi.id', 'nm_ibu','kd_pasien', 'nm_anak', 'tgl_lahir', 'umur', 'jns_imunisasi', 'bb', 'pb','imunisasi.created_at')->where('kd_pasien','like', '%'.$this->search.'%')->orWhere('nm_ibu','like', '%'.$this->search.'%')->orWhere('nm_ayah','like', '%'.$this->search.'%')
                 ->orWhere('nm_anak','like', '%'.$this->search.'%')
                 ->orderBy('imunisasi.id', 'desc')->paginate($this->paginate)
            ]);
        }
    }

    public function store(){
        $message = [
            'required' => 'Inputan tidak boleh kosong',
            'pb.max' => 'Inputan numeric dari 1 - 254',
            'max' => 'Maksimal hanya :max karakter',
            'numeric' => 'Inputan harus berupa angka',
            'date' => 'Inputan harus berupa tanggal'
        ];
        $this->validate([
            "nm_anak" => 'required|max:30',
            "tgl_lahir" => 'required|date',
            "umur" => 'required|max:10',
            "jns_imunisasi" => 'required|max:30',
            "bb" => 'required|max:10',
            "pb" => 'required|max:254|numeric'
        ], $message);

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
        $data->update([
            'status' => '1',
            'users_id' => $this->users_id
        ]);
        $this->resetInput();
        $this->emit('imunisasiDeleted'); 
    }

    public function update(){
        $message = [
            'required' => 'Inputan tidak boleh kosong',
            'pb.max' => 'Inputan numeric dari 1 - 254',
            'max' => 'Maksimal hanya :max karakter',
            'numeric' => 'Inputan harus berupa angka',
            'date' => 'Inputan harus berupa tanggal'
            
        ];
        $this->validate([
            "nm_anak" => 'required|max:30',
            "tgl_lahir" => 'required|date',
            "umur" => 'required|max:10',
            "jns_imunisasi" => 'required|max:30',
            "bb" => 'required|max:10',
            "pb" => 'required|max:254|numeric'
        ], $message);
        
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
