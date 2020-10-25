<?php

namespace App\Http\Livewire;

use App\Periksa;
use Livewire\Component;
use Livewire\WithPagination;

class PeriksaIndex extends Component
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
    public $periksaId, $no_kk, $g, $p, $a, $hpht, $bb, $td, $tb, $li_la, $hb, $tt, $gol_darah, $kb_sebelum_hamil, $riwayat_penyakit, $riwayat_alergi, $jarak_kehamilan;

    public function mount(){
        $this->fill(request()->only('search', 'page'));
    }

    public function render()
    {
        if(!empty($this->pasienId)){
            return view('livewire.periksa-index', [
                'pasienId' => $this->pasienId,
                'nm_ibu' => $this->nm_ibu,
                'nm_ayah' => $this->nm_ayah,
                'no_tlpn' => $this->no_tlpn,
                'alamat' => $this->alamat,
                'periksa' => Periksa::select('id','no_kk','g','p','a','hpht','bb','td','tb','li_la','hb','tt','gol_darah','kb_sebelum_hamil','riwayat_penyakit','riwayat_alergi','jarak_kehamilan','created_at')->where([['pasien_id','=', $this->pasienId],['pemeriksaan.status','=','0']])->orderBy('id','desc')->paginate($this->paginate)
            ]);
        }else{
            return view('livewire.periksa-index', [
                'periksa' => empty($this->search) ?
                 Periksa::join('pasien', 'pasien.id', '=', 'pemeriksaan.pasien_id')->select('pemeriksaan.id','kd_pasien','nm_ibu','no_kk','g','p','a','hpht','bb','td','tb','li_la','hb','tt','gol_darah','kb_sebelum_hamil','riwayat_penyakit','riwayat_alergi','jarak_kehamilan','pemeriksaan.created_at')->where('pemeriksaan.status','0')->orderBy('pemeriksaan.id','desc')->paginate($this->paginate):
                 Periksa::join('pasien', 'pasien.id', '=', 'pemeriksaan.pasien_id')->select('pemeriksaan.id','kd_pasien','nm_ibu','no_kk','g','p','a','hpht','bb','td','tb','li_la','hb','tt','gol_darah','kb_sebelum_hamil','riwayat_penyakit','riwayat_alergi','jarak_kehamilan','pemeriksaan.created_at')
                 ->where('kd_pasien','like', '%'.$this->search.'%')->orWhere('nm_ibu','like', '%'.$this->search.'%')->orWhere('nm_ayah','like', '%'.$this->search.'%')->orderBy('pemeriksaan.id','desc')->paginate($this->paginate)
            ]);
        }
        
    }

    public function store(){
        $message = [
            'max' => 'Maksimal hanya :max karakter',
            'numeric' => 'Inputan harus berupa angka',
            'required' => 'Inputan tidak boleh kosong'
        ];
        $this->validate([
            'no_kk' => 'max:254|numeric|nullable',
            'g' => 'required|numeric|max:254',
            'p' => 'required|numeric|max:254',
            'a' => 'required|numeric|max:254',
            'hpht' => 'required|max:128',
            'bb' => 'required|numeric|max:254',
            'td' => 'required|max:10',
            'tb' => 'max:254|numeric|nullable',
            'li_la' => 'max:10',
            'hb' => 'max:10',
            'tt' => 'max:254|numeric|nullable',
            'gol_darah' => 'max:2',
            'kb_sebelum_hamil' => 'required|max:30',
            'riwayat_penyakit' => 'max:30',
            'riwayat_alergi' => 'max:30',
            'jarak_kehamilan' => 'max:30'
        ],$message);

        Periksa::create([
            "users_id" => $this->users_id,
            "pasien_id" => $this->pasienId,
            "no_kk" => $this->no_kk,
            "g" => $this->g,
            "p" => $this->p,
            "a" => $this->a,
            "hpht" => $this->hpht,
            "bb" => $this->bb,
            "td" => $this->td,
            "tb" => $this->tb,
            "li_la" => $this->li_la,
            "hb" => $this->hb,
            "tt" => $this->tt,
            "gol_darah" => $this->gol_darah,
            "kb_sebelum_hamil" => $this->kb_sebelum_hamil,
            "riwayat_penyakit" => $this->riwayat_penyakit,
            "riwayat_alergi" => $this->riwayat_alergi,
            "jarak_kehamilan" => $this->jarak_kehamilan,
        ]);

        $this->resetInput();//panggil methodnya
        $this->emit('periksaStored');   
    }

    public function resetInput(){// function agar mengkosongkan form input
            $this->no_kk = null;
            $this->g = null;
            $this->p = null;
            $this->a = null;
            $this->hpht = null;
            $this->bb = null;
            $this->td = null;
            $this->tb = null;
            $this->li_la = null;
            $this->hb = null;
            $this->tt = null;
            $this->gol_darah = null;
            $this->kb_sebelum_hamil = null;
            $this->riwayat_penyakit = null;
            $this->riwayat_alergi = null;
            $this->jarak_kehamilan = null;
    }

    public function getPeriksa($id){
        $periksa = Periksa::find($id);
        $this->periksaId = $periksa['id'];
        $this->no_kk = $periksa['no_kk'];
        $this->g = $periksa['g'];
        $this->p = $periksa['p'];
        $this->a = $periksa['a'];
        $this->hpht = $periksa['hpht'];
        $this->bb = $periksa['bb'];
        $this->td = $periksa['td'];
        $this->tb = $periksa['tb'];
        $this->li_la = $periksa['li_la'];
        $this->hb = $periksa['hb'];
        $this->tt = $periksa['tt'];
        $this->gol_darah = $periksa['gol_darah'];
        $this->kb_sebelum_hamil = $periksa['kb_sebelum_hamil'];
        $this->riwayat_penyakit = $periksa['riwayat_penyakit'];
        $this->riwayat_alergi = $periksa['riwayat_alergi'];
        $this->jarak_kehamilan = $periksa['jarak_kehamilan'];
    }

    public function deletePeriksa($periksaId){
        $data = Periksa::find($periksaId);
        $data->update([
            'status' => '1',
            'users_id' => $this->users_id
        ]);
        $this->resetInput();
        $this->emit('periksaDeleted'); 
    }

    public function update(){
        $message = [
            'max' => 'Maksimal hanya :max karakter',
            'numeric' => 'Inputan harus berupa angka',
            'required' => 'Inputan tidak boleh kosong'
        ];
        $this->validate([
            'no_kk' => 'numeric|nullable',
            'g' => 'required|numeric|max:254',
            'p' => 'required|numeric|max:254',
            'a' => 'required|numeric|max:254',
            'hpht' => 'required|max:128',
            'bb' => 'required|numeric|max:254',
            'td' => 'required|max:10',
            'tb' => 'max:254|numeric|nullable',
            'li_la' => 'max:10',
            'hb' => 'max:10',
            'tt' => 'max:254|numeric|nullable',
            'gol_darah' => 'max:2',
            'kb_sebelum_hamil' => 'required|max:30',
            'riwayat_penyakit' => 'max:30',
            'riwayat_alergi' => 'max:30',
            'jarak_kehamilan' => 'max:30'
        ],$message);
        
        if(!empty($this->periksaId)){
            $periksa = Periksa::find($this->periksaId);
            $periksa->update([
                "users_id" => $this->users_id,
                "no_kk" => $this->no_kk,
                "g" => $this->g,
                "p" => $this->p,
                "a" => $this->a,
                "hpht" => $this->hpht,
                "bb" => $this->bb,
                "td" => $this->td,
                "tb" => $this->tb,
                "li_la" => $this->li_la,
                "hb" => $this->hb,
                "tt" => $this->tt,
                "gol_darah" => $this->gol_darah,
                "kb_sebelum_hamil" => $this->kb_sebelum_hamil,
                "riwayat_penyakit" => $this->riwayat_penyakit,
                "riwayat_alergi" => $this->riwayat_alergi,
                "jarak_kehamilan" => $this->jarak_kehamilan,
            ]);

            $this->resetInput();
            $this->emit('periksaUpdated');
        }
    }
}
