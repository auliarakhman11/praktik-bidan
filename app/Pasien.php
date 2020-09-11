<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Pasien extends Model
{
    use HasRoles;
    protected $table = 'pasien';

    public function kb(){
        // return $this->belongsToMany('App\User','kb','pasien_id','users_id')->withPivot(['umur_ibu']);
        return $this->belongsToMany(User::class, 'kb');
        // $data = 'testaja';
        // return $data;
    }
}
