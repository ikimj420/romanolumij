<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Laravelista\Comments\Commentable;

class Album extends Model
{
    use Taggable;
    use Commentable;

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

    //HasMany
    public function images()
    {
        return $this->hasMany(\App\Models\Image::class);
    }
}
