<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Periksa extends Model
{
    use HasRoles;
    protected $table = 'pemeriksaan';
    protected $fillable = ['users_id','pasien_id','no_kk','g','p','a','hpht','bb','td','tb','li_la','hb','tt','gol_darah','kb_sebelum_hamil','riwayat_penyakit','riwayat_alergi','jarak_kehamilan','status'];
}
