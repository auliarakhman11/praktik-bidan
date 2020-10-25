<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Auth\SessionGuard;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
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
        $kbq = DB::table('kb')
        ->select(DB::raw("CONCAT(YEAR(created_at),'/',MONTH(created_at)) AS tahun_bulan"), DB::raw('COUNT(*) AS jumlah_bulanan'))
        ->groupBy(DB::raw('YEAR(created_at),MONTH(created_at)'))
        ->orderBy('created_at','ASC')
        ->take(5)->get();

        $imunisasiq = DB::table('imunisasi')
        ->select(DB::raw("CONCAT(YEAR(created_at),'/',MONTH(created_at)) AS tahun_bulan"), DB::raw('COUNT(*) AS jumlah_bulanan'))
        ->groupBy(DB::raw('YEAR(created_at),MONTH(created_at)'))
        ->orderBy('created_at','ASC')
        ->take(5)->get();

        $pemeriksaanq = DB::table('pemeriksaan')
        ->select(DB::raw("CONCAT(YEAR(created_at),'/',MONTH(created_at)) AS tahun_bulan"), DB::raw('COUNT(*) AS jumlah_bulanan'))
        ->groupBy(DB::raw('YEAR(created_at),MONTH(created_at)'))
        ->orderBy('created_at','ASC')
        ->take(5)->get();

        $persalinanq = DB::table('persalinan')
        ->select(DB::raw("CONCAT(YEAR(created_at),'/',MONTH(created_at)) AS tahun_bulan"), DB::raw('COUNT(*) AS jumlah_bulanan'))
        ->groupBy(DB::raw('YEAR(created_at),MONTH(created_at)'))
        ->orderBy('created_at','ASC')
        ->take(5)->get();

        $tahun_bulan = [];
        $kb = [];
        $imunisasi = [];
        $persalinan = [];
        $pemeriksaan = [];

        foreach($kbq as $d){
            $tahun_bulan [] = $d->tahun_bulan;
            $kb [] = $d->jumlah_bulanan;
        }

        foreach($imunisasiq as $d){
            $imunisasi [] = $d->jumlah_bulanan;
        }

        foreach($pemeriksaanq as $d){
            $pemeriksaan [] = $d->jumlah_bulanan;
        }

        foreach($persalinanq as $d){
            $persalinan [] = $d->jumlah_bulanan;
        }

        return view('admin.dashboard',['title' => 'Dashboard', 'kb' => $kb, 'imunisasi' => $imunisasi, 'pemeriksaan' => $pemeriksaan, 'persalinan' => $persalinan, 'tahun_bulan' => $tahun_bulan]);
    }

    public function laporan(){
        $laporan = DB::table('kb')
        ->select(DB::raw("CONCAT(YEAR(created_at),'/',MONTH(created_at)) AS tahun_bulan"), DB::raw('COUNT(*) AS jumlah_bulanan'))
        ->groupBy(DB::raw('YEAR(created_at),MONTH(created_at)'))
        ->orderBy('tahun_bulan','DESC')
        ->take(5)->get();

        $tahun_bulan = [];
        $jumlah = [];

        foreach($laporan as $d){
            $tahun_bulan [] = $d->tahun_bulan;
            $jumlah [] = $d->jumlah_bulanan;
        }

        dd($tahun_bulan);
    }
}
