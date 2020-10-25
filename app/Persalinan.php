<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Persalinan extends Model
{
    use HasRoles;
    protected $table = 'persalinan';
    protected $fillable = ['users_id','pasien_id','tgl_lahir','jam_lahir','hamil_ke','umur_hamil','anc_ke','letak_janin','jenis_persalinan','lahir','jenkel','kembar','bb','pb','lk','rujuk','status'];
}
