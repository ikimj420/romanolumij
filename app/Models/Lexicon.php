<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
}
