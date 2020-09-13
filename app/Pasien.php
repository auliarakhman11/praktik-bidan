<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Pasien extends Model
{
    use HasRoles;
    protected $table = 'pasien';
    protected $fillable = ['nik_ayah','nik_ibu','nm_ayah','nm_ibu','tgl_lahir_ayah','tgl_lahir_ibu','no_tlpn','alamat'];

    public function kb(){
        // return $this->belongsToMany('App\User','kb','pasien_id','users_id')->withPivot(['umur_ibu']);
        return $this->belongsToMany(User::class, 'kb');
        // $data = 'testaja';
        // return $data;
    }
}
