<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function password(){
        return view('password.edit',['title' => 'Ganti Password']);
    }

    public function update(){
        request()->validate([
            'old_password' => 'required',
            'password' => ['required','string','min:6','confirmed']
        ]);
        $currentPassword = auth()->user()->password;
        $oldPassword = request('old_password');
        if(Hash::check($oldPassword,$currentPassword)){
            auth()->user()->update([
                'password' => bcrypt(request('password'))
            ]);
            return redirect()->back()->with('success' , 'Password berhasil diganti');
        }else{
            return redirect()->back()->withErrors(['old_password' => 'Password lama tidak sesuai']);
        }
    }
}
