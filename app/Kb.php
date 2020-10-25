<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Kb extends Model
{
    use HasRoles;
    protected $table = 'kb';
    protected $fillable = ['users_id','pasien_id','askeptor','umur_ayah','umur_ibu','jml_anak','jns_kontrasepsi','post_partum','ket','status'];
}
