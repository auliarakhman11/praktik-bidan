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
        $pdf = PDF::loadView('user.printkb')->setPaper('A4','landscape');
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
