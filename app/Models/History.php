<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class History extends Model
{
    protected $guarded = [];

    //url pathTitle
    public function pathTitle()
    {
        return url("/history/{$this->id}-".Str::slug($this->title, '_'));
    }
    //url pathAlav
    public function pathAlav()
    {
        return url("/history/{$this->id}-".Str::slug($this->alav, '_'));
    }
}
