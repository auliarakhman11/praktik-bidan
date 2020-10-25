<?php

namespace App\Http\Controllers;

use App\Notification;
use App\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;

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

    public function detail($id)
    {
        $pasien = Pasien::find(Crypt::decrypt($id));
        return view('user.detailPasien', ['pasien' => $pasien, 'title' => 'Detail Pasien']);
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

    public function notification(){
        request()->validate([
            'pasien_id' => ['required'],
            'ket' => ['required', 'max:128'],
            'tgl' => ['required']
        ]);
        Notification::create([
            'pasien_id' => request('pasien_id'),
            'ket' => request('ket'),
            'tgl' => request('tgl')
        ]);

        return redirect()->back()->with('success' , 'Data pengingat berhasil dibuat');
    }

    // public function getKb(){
    //     $kb = Pasien::join('contacts', 'users.id', '=', 'contacts.user_id')
    //     ->join('orders', 'users.id', '=', 'orders.user_id')
    //     ->select('users.*', 'contacts.phone', 'orders.price')
    //     ->get();
            
        

    //     dd($kb);
    // }
}
