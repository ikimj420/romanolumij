<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentTaggable\Taggable;
use Illuminate\Support\Str;
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

    //url pathTitle
    public function pathTitle()
    {
        return url("/album/{$this->id}-".Str::slug($this->name, '_'));
    }

    //url albumPics
    public function albumPics()
    {
        return asset('/storage/albums/'.$this->pics);
    }

    //url pathProfile
    public function pathProfile()
    {
        return url("/profile/{$this->user['id']}-".Str::slug($this->user['username'], '_'));
    }

    //url userPics
    public function userPics()
    {
        return asset('/storage/users/'.$this->user['avatar']);
    }
}
