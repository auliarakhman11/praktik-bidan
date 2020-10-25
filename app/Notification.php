<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Notification extends Model
{
    use HasRoles;
    protected $table = 'notification';
    public $timestamps= false;
    protected $fillable = ['pasien_id','tgl','ket'];
}
