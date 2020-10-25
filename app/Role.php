<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Role extends Model
{
    use HasRoles;
    protected $table = 'model_has_roles';
    public $timestamps= false;
    protected $fillable = ['role_id'];
}
