<?php

namespace App\Http\Controllers;

use App\Kb;
use PDF;
use Illuminate\Http\Request;

class KbController extends Controller
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
        return view('user.kb',['title' => 'KB']);
    }

    public function print()
    {
        $message = [
            'numeric' => 'Inputan harus berupa angka',
            'required' => 'Inputan tidak boleh kosong'
        ];
        request()->validate([
            'bulan' => 'required',
            'tahun' => 'required|numeric'
        ],$message);
        $kb = Kb::join('pasien', 'kb.pasien_id', '=' ,'pasien.id')
        ->select('askeptor','kb.created_at','nm_ibu','umur_ibu','nm_ayah','umur_ayah','jml_anak','jns_kontrasepsi','post_partum','alamat','no_tlpn')
        ->whereYear('kb.created_at', request('tahun'))
        ->whereMonth('kb.created_at', request('bulan'))
        ->get();
        $pdf = PDF::loadView('user.printkb', ['kb' => $kb])->setPaper('A4','landscape');
        return $pdf->stream();
    }

    // public function relation(){
    //     $kb = Kb::join('users', 'users.id', '=', 'kb.users_id')
    //         ->join('pasien', 'pasien.id', '=', 'kb.pasien_id')
    //         ->select('umur_ibu','umur_ayah','users.name','pasien.nm_ibu')
    //         ->get();
    //     dd($kb);
    // }
}
