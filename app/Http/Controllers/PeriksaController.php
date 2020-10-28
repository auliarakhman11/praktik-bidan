<?php

namespace App\Http\Controllers;

use App\Periksa;
use PDF;
use Illuminate\Http\Request;

class PeriksaController extends Controller
{
    //
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
        return view('user.periksa',['title' => 'Periksa Kehamilan']);
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

        $pemeriksaan = Periksa::join('pasien', 'pemeriksaan.pasien_id', '=' ,'pasien.id')
        ->select('*','pemeriksaan.created_at as tanggal')
        ->whereYear('pemeriksaan.created_at', request('tahun'))
        ->whereMonth('pemeriksaan.created_at', request('bulan'))
        ->get();

        $pdf = PDF::loadView('user.printpemeriksaan', ['pemeriksaan' => $pemeriksaan])->setPaper('A4','landscape');
        return $pdf->stream();
    }
}
