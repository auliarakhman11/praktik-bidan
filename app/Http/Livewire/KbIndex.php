<?php

namespace App\Http\Livewire;

use App\Kb;
use Livewire\Component;
use Livewire\WithPagination;

class KbIndex extends Component
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
    public $kbId, $askeptor, $umur_ibu, $umur_ayah, $jml_anak, $jns_kontrasepsi, $post_partum, $ket;    

    public function mount(){
        $this->fill(request()->only('search', 'page'));
    }
    public function render()
    {
        if (!empty($this->pasienId)) {
            return view('livewire.kb-index', [
                'pasienId' => $this->pasienId,
                'nm_ibu' => $this->nm_ibu,
                'nm_ayah' => $this->nm_ayah,
                'no_tlpn' => $this->no_tlpn,
                'alamat' => $this->alamat,
                'kb' => Kb::select('id', 'askeptor', 'umur_ibu', 'umur_ayah', 'jml_anak', 'jns_kontrasepsi', 'post_partum', 'ket', 'created_at')->where([['pasien_id','=', $this->pasienId],['kb.status','=','0']])->orderBy('id', 'desc')->paginate($this->paginate)
            ]);
        }else{
            return view('livewire.kb-index', [
                'kb' => empty($this->search) ?
                 Kb::join('pasien', 'pasien.id', '=', 'kb.pasien_id')->select('kb.id', 'nm_ibu','kd_pasien', 'askeptor', 'umur_ibu', 'umur_ayah', 'jml_anak', 'jns_kontrasepsi', 'post_partum', 'ket', 'kb.created_at')
                 ->where('kb.status','0')
                 ->orderBy('kb.id', 'desc')->paginate($this->paginate):
                 Kb::join('pasien', 'pasien.id', '=', 'kb.pasien_id')->select('kb.id', 'nm_ibu','kd_pasien', 'askeptor', 'umur_ibu', 'umur_ayah', 'jml_anak', 'jns_kontrasepsi', 'post_partum', 'ket', 'kb.created_at')
                 ->where('kd_pasien','like', '%'.$this->search.'%')->orWhere('nm_ibu','like', '%'.$this->search.'%')->orWhere('nm_ayah','like', '%'.$this->search.'%')->orderBy('kb.id', 'desc')->paginate($this->paginate)
            ]);
        }
    }

    public function store(){
        $message = [
            'required' => 'Inputan tidak boleh kosong',
            'max' => 'Maksimal hanya :max karakter',
            'numeric' => 'Inputan harus berupa angka',
        ];

        $this->validate([
            'jns_kontrasepsi' => 'required',
            'askeptor' => 'required|max:4',
            'umur_ayah' => 'nullable|numeric|max:254',
            'umur_ibu' => 'nullable|numeric|max:254',
            'jml_anak' => 'nullable|numeric|max:254',
            'jns_kontrasepsi' => 'required|max:20',
            'post_partum' => 'max:20',
            'ket' => 'max:20'
        ],$message);

        Kb::create([
            "users_id" => $this->users_id,
            "pasien_id" => $this->pasienId,
            "askeptor" => $this->askeptor,
            "umur_ayah" => $this->umur_ayah,
            "umur_ibu" => $this->umur_ibu,
            "jns_kontrasepsi" => $this->jns_kontrasepsi,
            "jml_anak" => $this->jml_anak,
            "post_partum" => $this->post_partum,
            "ket" => $this->ket
        ]);

        $this->resetInput();//panggil methodnya
        $this->emit('kbStored');   
    }

    public function resetInput(){// function agar mengkosongkan form input
        $this->kbId = null;
        $this->askeptor = null;
        $this->umur_ayah = null;
        $this->umur_ibu = null;
        $this->jml_anak = null;
        $this->jns_kontrasepsi = null;
        $this->post_partum = null;
        $this->ket = null;
    }

    public function getKb($id){
        $kb = Kb::find($id);
        $this->kbId = $kb['id'];
        $this->askeptor = $kb['askeptor'];
        $this->umur_ibu = $kb['umur_ibu'];
        $this->umur_ayah = $kb['umur_ayah'];
        $this->jml_anak = $kb['jml_anak'];
        $this->jns_kontrasepsi = $kb['jns_kontrasepsi'];
        $this->post_partum = $kb['post_partum'];
        $this->ket = $kb['ket'];
    }

    public function deleteKb($kbId){
        $data = Kb::find($kbId);
        $data->update([
            'status' => '1',
            'users_id' => $this->users_id
        ]);
        $this->resetInput();
        $this->emit('kbDeleted'); 
    }

    public function update(){
        $message = [
            'required' => 'Inputan tidak boleh kosong',
            'max' => 'Maksimal hanya :max karakter',
            'numeric' => 'Inputan harus berupa angka',
        ];

        $this->validate([
            'jns_kontrasepsi' => 'required',
            'askeptor' => 'required|max:4',
            'umur_ayah' => 'nullable|numeric|max:254',
            'umur_ibu' => 'nullable|numeric|max:254',
            'jml_anak' => 'nullable|numeric|max:254',
            'jns_kontrasepsi' => 'required|max:20',
            'post_partum' => 'max:20',
            'ket' => 'max:20'
        ],$message);
        
        if(!empty($this->kbId)){
            $kb = Kb::find($this->kbId);
            $kb->update([
                "users_id" => $this->users_id,
                "askeptor" => $this->askeptor,
                "umur_ayah" => $this->umur_ayah,
                "umur_ibu" => $this->umur_ibu,
                "jns_kontrasepsi" => $this->jns_kontrasepsi,
                "jml_anak" => $this->jml_anak,
                "post_partum" => $this->post_partum,
                "ket" => $this->ket
            ]);

            $this->resetInput();
            $this->emit('kbUpdated');
        }
    }
}
