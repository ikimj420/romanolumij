<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Lexicon extends Model
{
    protected $guarded = [];


    //BelongsTo
    public function category()
    {
        return $this->belongsTo(\App\Models\Category::class, 'category_id');
    }

    //BelongsTo
    public function user()
    {
        return $this->belongsTo(\App\User::class, 'user_id');
    }

    //url pathTitle
    public function pathTitle()
    {
        return url("/lexicon/{$this->id}-".Str::slug($this->rom.'_'.$this->ser.'_'.$this->eng, '_'));
    }

    //url lexiconPics
    public function lexiconPics()
    {
        return asset('/storage/categories/'.$this->category['pics']);
    }
}
