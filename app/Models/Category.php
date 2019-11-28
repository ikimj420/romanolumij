<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $guarded = [];

    //HasMany
    public function albums()
    {
        return $this->hasMany(\App\Models\Album::class);
    }

    //HasMany
    public function lexicons()
    {
        return $this->hasMany(\App\Models\Lexicon::class);
    }

    //HasMany
    public function poems()
    {
        return $this->hasMany(\App\Models\Poem::class);
    }

    //HasMany
    public function stories()
    {
        return $this->hasMany(\App\Models\Story::class);
    }
}
