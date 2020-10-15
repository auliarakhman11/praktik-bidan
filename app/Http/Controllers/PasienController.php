<?php

namespace App\Http\Controllers;

use App\Pasien;
use Illuminate\Http\Request;

class PasienController extends Controller
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
        return view('user.pasien',['title' => 'Pasien']);
    }

    public function detail(Pasien $d)
    {
        return view('user.detailPasien', ['pasien' => $d, 'title' => 'Detail Pasien']);
    }

    public function edit(Request $request){
        if(!empty($request->id)){
            $pasien = Pasien::find($request->id);
            $pasien->update([
                "nm_ibu" => $request->nm_ibu,
                "nm_ayah" => $request->nm_ayah,
                "no_tlpn" => $request->no_tlpn,
                "alamat" => $request->alamat
            ]);
            return redirect()->back()->with('edit', 'Data Pasien Berhasil Diedit');
        }
    }

    // public function getKb(){
    //     $kb = Pasien::join('contacts', 'users.id', '=', 'contacts.user_id')
    //     ->join('orders', 'users.id', '=', 'orders.user_id')
    //     ->select('users.*', 'contacts.phone', 'orders.price')
    //     ->get();
            
        

    //     dd($kb);
    // }
}
