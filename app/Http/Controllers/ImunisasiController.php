<?php

namespace App\Http\Controllers;

use App\Imunisasi;
use PDF;
use Illuminate\Http\Request;

class ImunisasiController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('user.imunisasi',['title' => 'Imunisasi']);
    }

    public function print(){
        $message = [
            'numeric' => 'Inputan harus berupa angka',
            'required' => 'Inputan tidak boleh kosong'
        ];
        request()->validate([
            'bulan' => 'required',
            'tahun' => 'required|numeric'
        ],$message);

        $imunisasi = Imunisasi::join('pasien', 'imunisasi.pasien_id', '=' ,'pasien.id')
        ->select('imunisasi.created_at','nm_anak','nm_ibu','nm_ayah','tgl_lahir','umur','jns_imunisasi','bb','pb','alamat','no_tlpn')
        ->whereYear('imunisasi.created_at', request('tahun'))
        ->whereMonth('imunisasi.created_at', request('bulan'))
        ->get();

        $pdf = PDF::loadView('user.printimunisasi', ['imunisasi' => $imunisasi])->setPaper('A4','landscape');
        return $pdf->stream();
    }
}
