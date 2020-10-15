<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Imunisasi extends Model
{
    use HasRoles;
    protected $table = 'imunisasi';
    protected $fillable = ['pasien_id','users_id','nm_anak','tgl_lahir','umur','jns_imunisasi','bb','pb'];
}
