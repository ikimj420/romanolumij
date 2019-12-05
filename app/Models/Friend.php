<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Friend extends Model
{
    protected $guarded = [];

    //url pathTitle
    public function pathTitle()
    {
        return url("/friend/{$this->id}-".Str::slug($this->title, '_'));
    }

    //url friendPics
    public function friendPics()
    {
        return asset('/storage/friends/'.$this->pics);
    }
}
