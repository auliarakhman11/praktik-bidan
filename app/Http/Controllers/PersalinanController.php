<?php

namespace App\Http\Controllers;

use App\Persalinan;
use PDF;
use Illuminate\Http\Request;

class PersalinanController extends Controller
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
        return view('user.persalinan',['title' => 'Persalinan']);
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

        $persalinan = Persalinan::join('pasien', 'persalinan.pasien_id', '=' ,'pasien.id')
        ->select('*')
        ->whereYear('persalinan.created_at', request('tahun'))
        ->whereMonth('persalinan.created_at', request('bulan'))
        ->get();
        $pdf  = PDF::loadView('user.printpersalinan', ['persalinan' => $persalinan])->setPaper('A4','landscape');
        return $pdf->stream();
    }
}
