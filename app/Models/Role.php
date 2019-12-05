<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Role extends Model
{

    protected $guarded = [];

    public function users()
    {
        return $this->hasMany(\App\User::class);
    }

    //url pathTitle
    public function pathTitle()
    {
        return url("/role/{$this->id}-".Str::slug($this->userLevel, '_'));
    }

    //url rolePics
    public function rolePics()
    {
        return asset('/storage/svg/login.svg');
    }
}
