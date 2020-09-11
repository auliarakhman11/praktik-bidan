<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class Kb extends Model
{
    use HasRoles;
    protected $table = 'kb';
}
