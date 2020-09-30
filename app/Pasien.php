<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;
use Alfa6661\AutoNumber\AutoNumberTrait;

class Pasien extends Model
{
    use HasRoles;
    use AutoNumberTrait;
    protected $table = 'pasien';
    protected $fillable = ['kd_pasien','nik_ayah','nik_ibu','nm_ayah','nm_ibu','tgl_lahir_ayah','tgl_lahir_ibu','no_tlpn','alamat'];

    public function kb(){
        // return $this->belongsToMany('App\User','kb','pasien_id','users_id')->withPivot(['umur_ibu']);
        return $this->belongsToMany(User::class, 'kb');
        // $data = 'testaja';
        // return $data;
    }

    public function getAutoNumberOptions()
    {
        return [
            'kd_pasien' => [
                'format' => function () {
                    return 'PS/' . date('m.Y') . '/?'; 
                }, // Format kode yang akan digunakan.
                'length' => 5 // Jumlah digit yang akan digunakan sebagai nomor urut
            ]
        ];
    }
}
